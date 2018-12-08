<?php

namespace App\Admin\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class UserController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('用户列表')
            ->body($this->grid());
    }

    /**
     * Show interface.
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('用户详情')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('编辑用户信息')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('创建用户')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User);

        $grid->id('Id');
        $grid->username('用户名');
        $grid->real_name('姓名');
        $grid->role_id('角色')->display(function () {
            $name = $this->role->name;
            return "<span class='label label-primary'>$name</span>";
        });
        $grid->created_at('创建于');

        // 搜索过滤
        $grid->filter(function (Grid\Filter $filter) {
            $filter->disableIdFilter();
            $filter->like('real_name', '姓名');
            $filter->like('username', '用户名');
        });

        $grid->actions(function ($actions) {
            $actions->disableDelete();
        });
        return $grid;
    }

    /**
     * Make a show builder.
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(User::findOrFail($id));

        $show->username('用户名');
        $show->real_name('姓名');
        $show->role()->name('角色')->unescape()->as(function ($name) {
            return "<span class='label label-primary'>$name</span>";
        });
        $show->created_at('创建于');
        $show->updated_at('更新于');

        return $show;
    }

    /**
     * Make a form builder.
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User);

        $roles = [];
        foreach (Role::all() as $role)
            $roles[$role->id] = $role->name;

        $form->text('username', '用户名')->required();
        $form->text('real_name', '真实姓名')->required();
        $form->select('role_id', '角色')->options($roles)->required();

        return $form;
    }
}
