<?php namespace PCI\Http\Controllers\Aux;

use PCI\Repositories\Interfaces\Aux\PetitionTypeRepositoryInterface;
use Redirect;
use Illuminate\View\Factory;
use PCI\Http\Requests\Aux\PetitionTypeRequest;

class PetitionTypesController extends AbstractAuxController
{

    /**
     * @var \PCI\Repositories\Interfaces\Aux\PetitionTypeRepositoryInterface
     */
    private $repo;

    /**
     * @var \PCI\Models\PetitionType
     */
    private $model;

    /**
     * @param \Illuminate\View\Factory $view
     * @param \PCI\Repositories\Interfaces\Aux\PetitionTypeRepositoryInterface $repo
     */
    public function __construct(Factory $view, PetitionTypeRepositoryInterface $repo)
    {
        parent::__construct($view);

        $this->repo = $repo;
    }

    public function index()
    {
        return $this->makeView(
            'aux.index',
            $this->repo->getIndexViewVariables()
        );
    }

    /**
     * @param string|int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $variables = $this->repo->getShowViewVariables($id);

        $variables->setUsersGoal('Tipo de Pedidos en el sistema');

        return $this->makeView('aux.show', $variables);
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return $this->makeView('aux.create', $this->repo->getCreateViewVariables());
    }

    /**
     * @param \PCI\Http\Requests\Aux\PetitionTypeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PetitionTypeRequest $request)
    {
        $this->model = $this->repo->create($request->all());

        return Redirect::route('petitionTypes.show', $this->model->slug);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $variables = $this->repo->getEditViewVariables($id);

        $variables->setUsersGoal(trans('models.petitionTypes.edit'));

        return $this->makeView('aux.edit', $variables);
    }

    /**
     * @param $id
     * @param \PCI\Http\Requests\Aux\PetitionTypeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, PetitionTypeRequest $request)
    {
        $this->model = $this->repo->update($id, $request->all());

        return Redirect::route('petitionTypes.show', $this->model->slug);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        return $this->destroyPrototype($this->repo->delete($id), 'petitionTypes');
    }
}