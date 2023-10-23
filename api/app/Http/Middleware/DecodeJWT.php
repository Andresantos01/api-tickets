<?php

namespace App\Http\Middleware;

use Closure;
use App\Utils\DecodedTokenJWTUtils;
use Illuminate\Database\Eloquent\Model;
use App\Models\PerfilModuloPermissao;
use App\Models\Modulo;
use App\Models\Permissao;

class DecodeJWT
{
    public function handle($request, Closure $next)
    {
        $decoded = DecodedTokenJWTUtils::userDecoded($request);
        $userId = $decoded['sub'];
    
        // Determina o módulo e a permissão com base no request
        $actionName = $request->route()[1]['uses'];
        list($controller, $method) = explode('@', $actionName);
        $moduloName = strtolower(str_replace('Controller', '', class_basename($controller)));
    
        // Consultar o banco de dados para obter os IDs correspondentes
        $modulo = Modulo::where('nome', $moduloName)->first();
        $permissao = Permissao::where('nome', $method)->first();
    
        // Se não encontrar o módulo ou a permissão, negar o acesso
        if (!$modulo || !$permissao) {
            return response()->json(['message' => 'Acesso negado.'], 403);
        }
    
        // Verifica se o perfil do usuário tem a permissão necessária para o módulo relevante
        $hasPermission = PerfilModuloPermissao::where('perfil_id', $userId)
                                              ->where('modulo_id', $modulo->id)
                                              ->where('permissao_id', $permissao->id)
                                              ->exists();
    
        if ($hasPermission) {
            return $next($request);
        } else {
            return response()->json(['message' => 'Você não tem permissão suficiente para excutar essa ação.'], 403);
        }
    }
    

}
