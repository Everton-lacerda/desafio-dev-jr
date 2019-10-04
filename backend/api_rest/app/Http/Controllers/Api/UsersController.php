<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class UsersController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function index()
    {
        $data = ['data' => $this->user->paginate(10)];
        return response()->json($data);
        // return ::all();
    }

    public function show($id)
    {
        // if(!$id) return response()->json(('Validation fails'), 400);
        
        $user = $this->user->find($id);
        if (!$user) return response()->json('User not exists.', 404);

        $data = ['data' => $user];
        return response()->json($data);
    }
    public function store(Request $request)
    {
        try {
            $userData = $request->all();
            $userData['password'] = bcrypt($userData['password']);
            $this->user->create($userData);

            return response()->json($userData);
        } catch (\Exception $e) {
            return response()->json('Erro ao fazer o Cadastro', 404);
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $userData = $request->all();
            $user = $this->user->find($id);
            $user->update($userData);

            $return = ['data' => ['msg' => 'Usuario atualizado com sucesso!']];
            return response()->json($return, 201);
        } catch (\Exception $e) {
            return response()->json('Houve um erro ao realizar operação de atualizar', 500);
        }
    }

    public function delete(User $id)
    {
        try {
            $id->delete();
            return response()->json(['data' => ['msg' => 'O Usuario: ' . $id->name . ' removido com sucesso!']], 200);
        } catch (\Exception $e) {
           return response()->json('Houve um erro ao realizar operação de remover', 500);
        }
    }
}
