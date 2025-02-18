<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('Id'))->sortable();
        $grid->column('name', __('スタッフ名'))->sortable();
        $grid->column('email', __('Email'));
        $grid->column('email_verified_at', __('メール認証日'));
        $grid->column('department_id', __('部署id'))->sortable();
        $grid->column('start_date', __('入社日'))->sortable();
        $grid->column('length', __('勤続年数'))->sortable();
        $grid->column('created_at', __('登録日'))->sortable();
        $grid->column('updated_at', __('更新日'))->sortable();
        $grid->column('deleted_at', __('削除'))->sortable();

        $grid->filter(function($filter) {
            $filter->like('name', 'スタッフ名');
            $filter->like('department_id', '部署ID');
            $filter->like('start_date', '入社日');
            $filter->like('length', '勤続年数');
            $filter->between('created_at', '登録日')->datetime();
            $filter->between('updated_at', '更新日')->datetime();
            $filter->scope('trashed', 'Soft deleted data')->onlyTrashed();
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('email_verified_at', __('Email verified at'));
        $show->field('department_id', __('Department id'));
        $show->field('start_date', __('Start date'));
        $show->field('length', __('Length'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('deleted_at', __('Deleted at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User());

        $form->text('name', __('Name'));
        $form->email('email', __('Email'));
        $form->datetime('email_verified_at', __('Email verified at'))->default(date('Y-m-d H:i:s'));
        $form->password('password', __('Password'));
        $form->number('department_id', __('Department id'));
        $form->date('start_date', __('Start date'))->default(date('Y-m-d'));
        $form->number('length', __('Length'));
        $form->datetime('deleted_at', __('Deleted at'))->default(NULL);
        
        $form->saving(function (Form $form) {
            if ($form->password && $form->model()->password != $form->password) {
                $form->password = bcrypt($form->password);
            } else {
                $form->password = $form->model()->password;
            }
        });

        return $form;
    }
}
