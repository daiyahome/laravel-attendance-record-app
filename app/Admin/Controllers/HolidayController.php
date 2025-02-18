<?php

namespace App\Admin\Controllers;

use App\Models\Holiday;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class HolidayController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Holiday';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Holiday());

        $grid->column('id', __('Id'));
        $grid->column('name', __('名称'))->sortable();
        $grid->column('user_length', __('勤続年数'));
        $grid->column('days', __('日数'));
        $grid->column('created_at', __('登録日'));
        $grid->column('updated_at', __('更新日'));

        $grid->filter(function($filter) {
            $filter->like('name', '名称');
            $filter->between('created_at', '登録日')->datetime();
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
        $show = new Show(Holiday::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('user_length', __('User length'));
        $show->field('days', __('Days'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Holiday());

        $form->text('name', __('Name'));
        $form->number('user_length', __('User length'));
        $form->number('days', __('Days'));

        return $form;
    }
}
