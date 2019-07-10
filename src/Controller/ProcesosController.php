<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
use Cake\ORM\Query;
use Cake\ORM\Table;
use App\Controller\AppController;

/**
 * Procesos Controller
 *
 * @property \App\Model\Table\ProcesosTable $Procesos
 *
 * @method \App\Model\Entity\Proceso[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProcesosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

    public function index()
    {
        $this->paginate = [
            'contain' => ['Municipios'=>'Departamentos','Solicitante']
        ];
        $procesos = $this->paginate($this->Procesos);

        $this->set(compact('procesos'));
    }

    /**
     * View method
     *
     * @param string|null $id Proceso id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $proceso = $this->Procesos->get($id, [
            'contain' => ['Municipios','Solicitante']
        ]);

        $this->set('proceso', $proceso);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
         $proceso = $this->Procesos->newEntity();
		     $result=$this->Procesos->find('all')->select(['id'])->last();
         $next=($result->id)+1;

        if ($this->request->is('post')) {
            $proceso = $this->Procesos->patchEntity($proceso, $this->request->getData());
            $fecha=date("Y-m-d H:i:s");
            $proceso->fecha = $fecha;
            $proceso->numero_proceso = 'P'.$next;
            $proceso->usuario_solicitante_id = 1;
		     	if ($this->Procesos->save($proceso)) {
                $this->Flash->success(__('El proceso se ha guardado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El proceso no se pudo guardar. Inténtalo de nuevo.'));
        }
        $tableRegObj = TableRegistry::get('Departamentos');
        $departamento = $tableRegObj->find('all')->toArray();
        $this->set(compact('proceso','departamento'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Proceso id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $proceso = $this->Procesos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $proceso = $this->Procesos->patchEntity($proceso, $this->request->getData());
            if ($this->Procesos->save($proceso)) {
                $this->Flash->success(__('The proceso has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The proceso could not be saved. Please, try again.'));
        }
        $id_dpto = $this->Procesos->Municipios->find('all')->select(['id_dpto'])->where([ 'id' =>$proceso->municipio_id ])->toArray();
	    $municipios = $this->Procesos->Municipios->find('all')->select(['id','nombre_municipio','id_dpto'])->where([ 'id_dpto' =>$id_dpto[0]->id_dpto ])->toArray();

		$tableRegObj = TableRegistry::get('Departamentos');
        $departamento = $tableRegObj->find('all')->toArray();
        $this->set(compact('proceso','departamento','municipios','id_dpto'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Proceso id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $proceso = $this->Procesos->get($id);
        if ($this->Procesos->delete($proceso)) {
            $this->Flash->success(__('The proceso has been deleted.'));
        } else {
            $this->Flash->error(__('The proceso could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function municipios($id = null)
    {
      $cbx="";
  	  if ($this->request->is('ajax')) {
  		  $id=!empty($id)?$id:0;
  	    $municipios = $this->Procesos->Municipios->find('all')->select(['id','nombre_municipio'])->where([ 'id_dpto' =>$id ]);
  		  foreach ($municipios as $row) {
  			 $cbx.='<option value="'.$row->id.'">'.utf8_decode($row->nombre_municipio).'</option>';
  		  }
  	  }
	  echo $cbx;
	  exit;
	 }

}
