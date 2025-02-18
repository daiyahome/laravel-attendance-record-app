<?php

namespace App\Admin\Controllers;

use App\Models\Department;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class DepartmentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Department';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Department());

        $grid->column('id', __('Id'))->sortable();
        $grid->column('name', __('部署名'))->sortable();
        $grid->column('office', __('事務所名'))->sortable();
        $grid->column('created_at', __('登録日'))->sortable();
        $grid->column('updated_at', __('更新日'))->sortable();
        
        $grid->filter(function($filter) {
            $filter->like('name', '部署名');
            $filter->like('office', '事務所名');
            $filter->between('created_at', '登録日')->datetime();
            $filter->between('updated_at', '更新日')->datetime();
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
        $show = new Show(Department::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('office', __('Office'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Department());

        $form->text('name', __('Name'));
        $form->text('office', __('Office'));

        return $form;
    }
}
