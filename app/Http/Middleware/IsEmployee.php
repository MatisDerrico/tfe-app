<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsEmployee
{
    /**
     * Vérifie que l'utilisateur connecté est bien un employé
     * Si ce n'est pas le cas une page 403 est générée
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */



    public function handle(Request $request, Closure $next): Response // La fonction handle prend en paramètre une instance d'un objet request et renvoie une fonction de redirection en argument (closure)
    {
        if($request->user()->is_employee) // vérification de la colonne is_employe de l'utilisateur connecté   is_employee === true
        {
            return $next($request);
        }

        return abort(403, 'Accès impossible');

    }
}
