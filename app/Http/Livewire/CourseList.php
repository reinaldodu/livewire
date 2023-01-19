<?php
namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class CourseList extends Component
{
    
    use WithPagination;
    protected $queryString = ['search' => ['except' => '']];
    
    public $contador=0;
    public $hola;
    public $search='';
    public $name, $email, $password; 
    public $open = false;
    //reglas de validacion
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required'
    ];
    
    public function render()
    {
        return view('livewire.course-list', [
            'users' => User::where('name', 'like', '%'.$this->search.'%')->get()
        ]);
    }

    public function borrar()
    {
        $this->search='';
        $this->contador++;
    }

    public function elimina(User $user)
    {
        $user->delete();
    }

    public function incrementa()
    {
        $this->contador++;
        
    }

    public function crear() {
        
        //validar los campos
        $this->validate();
        
        //Crear un usuario
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ]);
        //Cerrar el modal despues de crear el usuario
        $this->open = false;
        //reseteamos los valores de los campos
        $this->reset(['name', 'email', 'password']);
    }
}
