<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * CONTROLADOR DE AUTENTICACIÓN
 * Aquí gestionamos el login, el registro y el cierre de sesión de los usuarios.
 */
class AuthController extends Controller
{
    /**
     * Muestra el formulario de login. 
     * Si ya estás logueado, te manda a tu sitio directamente.
     */
    public function mostrarLogin()
    {
        if (Auth::check()) {
            return $this->redirigirSegunRol();
        }
        return view('auth.login');
    }

    /**
     * Procesa los datos del formulario de login.
     */
    public function procesarLogin(Request $request)
    {
        // Validamos que el email y la contraseña se hayan escrito.
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ], [
            'email.required'    => 'Introduce tu email para entrar.',
            'password.required' => 'La contraseña es obligatoria.',
        ]);

        // Intentamos autenticar al usuario.
        if (Auth::attempt($credentials, $request->boolean('recuerdame'))) {
            // Regeneramos la sesión por seguridad (evita ataques de fijación de sesión).
            $request->session()->regenerate();
            return $this->redirigirSegunRol();
        }

        // Si falla, volvemos atrás con un mensaje de error.
        return back()->withErrors([
            'email' => 'Credenciales incorrectas. Revisa tus datos.',
        ])->onlyInput('email');
    }

    /**
     * Muestra el formulario de registro para nuevos clientes.
     */
    public function mostrarRegistro()
    {
        return view('auth.registro');
    }

    /**
     * Crea un nuevo usuario en la base de datos.
     */
    public function procesarRegistro(Request $request)
    {
        // Validamos todos los campos necesarios.
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed', // 'confirmed' busca un campo 'password_confirmation'.
            'phone'    => 'nullable|string|max:20',
            'address'  => 'nullable|string|max:500',
        ], [
            'email.unique'       => 'Este email ya está en uso. Prueba con otro.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ]);

        // Creamos el usuario en la BD.
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password), // Encriptamos la contraseña siempre.
            'phone'    => $request->phone,
            'address'  => $request->address,
            'role'     => 'cliente', // Por defecto todos son clientes.
        ]);

        // Iniciamos sesión automáticamente al terminar de registrarse.
        Auth::login($user);

        return redirect()->route('cliente.novedades')
                         ->with('bienvenida', "¡Qué bueno tenerte aquí, {$user->name}!");
    }

    /**
     * Cierra la sesión del usuario actual.
     */
    public function cerrarSesion(Request $request)
    {
        Auth::logout();

        // Invalidamos la sesión y regeneramos el token CSRF por seguridad.
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('inicio')
                         ->with('mensaje_sesion', 'Sesión cerrada. ¡Vuelve pronto!');
    }

    /**
     * Función auxiliar para mandar al usuario a su panel correspondiente tras el login.
     */
    private function redirigirSegunRol()
    {
        return match(auth()->user()->role) {
            'admin' => redirect()->route('admin.panel'),
            default => redirect()->route('cliente.novedades'),
        };
    }
}
