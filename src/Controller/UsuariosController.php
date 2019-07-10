<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Usuarios Controller
 *
 * @property \App\Model\Table\UsuariosTable $Usuarios
 *
 * @method \App\Model\Entity\Usuario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsuariosController extends AppController
{


  //public function beforeFilter(Event $event)
    //{
      //  parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        //$this->Auth->allow(['add', 'logout']);
    //}

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */



    public function index()
    {
        $usuarios = $this->paginate($this->Usuarios);
        $this->set(compact('usuarios'));
    }

    /**
     * View method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => []
        ]);

        $this->set('usuario', $usuario);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
  
        $usuario = $this->Usuarios->newEntity();
        if ($this->request->is('post')) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
            $usuario->contraseña=$this->_setPassword($usuario->contraseña);
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('El usuario ha sido guardado.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El usuario ha sido sa. El usuario no pudo ser guardado. Por favor, inténtalo de nuevo.'));
        }
        $this->set(compact('usuario'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
            $usuario->contraseña=$this->_setPassword($usuario->contraseña);
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('El usuario ha sido guardado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El usuario no pudo ser salvado. Inténtalo de nuevo.'));
        }
        $this->set(compact('usuario'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usuario = $this->Usuarios->get($id);
        if ($this->Usuarios->delete($usuario)) {
            $this->Flash->success(__('El usuario ha sido eliminado.'));
        } else {
            $this->Flash->error(__('El usuario no pudo ser eliminado. Inténtalo de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();

            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }else{
                $this->Flash->error(__('Nombre de usuario o contraseña no válidos, inténtalo de nuevo'));
            }
        }
          //$this->Flash->error(__('Invalid username or password, try again'));

        $this->layout = 'login';
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    function _setPassword($password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }

}
