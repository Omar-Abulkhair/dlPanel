@extends('Panel::layouts.dashboard.main')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/pages/app-todo.css')}}">
@stop

@section('script')
    <script src="{{asset('/app-assets/js/scripts/pages/app-todo.js')}}"></script>
@stop
@php($breaالشd=false)
@section('body-class', 'content-left-sidebar todo-application navbar-floating footer-static menu-expanded pace-done modal-open')
@section('wrapper', 'content-area-wrapper')
@section('content')
    <div class="sidebar-left">
        <div class="sidebar">
            <div class="sidebar-content todo-sidebar d-flex">
                        <span class="sidebar-close-icon">
                            <i class="feather icon-x"></i>
                        </span>
                <div class="todo-app-menu">
                    <div class="form-group text-center add-task">
                        <button type="button" class="btn btn-primary btn-block my-1" data-toggle="modal"
                                data-target="#addTaskModal">Add Task
                        </button>
                    </div>
                    <div class="sidebar-menu-list">
                        <div class="list-group list-group-filters font-medium-1">
                            <a href="#" class="list-group-item list-group-item-action border-0 pt-0 active">
                                <i class="font-medium-5 feather icon-mail mr-50"></i> All
                            </a>
                        </div>
                        <hr>
                        <h5 class="mt-2 mb-1 pt-25">Filters</h5>
                        <div class="list-group list-group-filters font-medium-1">
                            <a href="#" class="list-group-item list-group-item-action border-0"><i
                                    class="font-medium-5 feather icon-star mr-50"></i> Starred</a>
                            <a href="#" class="list-group-item list-group-item-action border-0"><i
                                    class="font-medium-5 feather icon-info mr-50"></i> Important</a>
                            <a href="#" class="list-group-item list-group-item-action border-0"><i
                                    class="font-medium-5 feather icon-check mr-50"></i> Completed</a>
                            <a href="#" class="list-group-item list-group-item-action border-0"><i
                                    class="font-medium-5 feather icon-trash mr-50"></i> Trashed</a>
                        </div>
                        <hr>
                        <h5 class="mt-2 mb-1 pt-25">Labels</h5>
                        <div class="list-group list-group-labels font-medium-1">
                            <a href="#"
                               class="list-group-item list-group-item-action border-0 d-flex align-items-center"><span
                                    class="bullet bullet-primary mr-1"></span> Frontend</a>
                            <a href="#"
                               class="list-group-item list-group-item-action border-0 d-flex align-items-center"><span
                                    class="bullet bullet-warning mr-1"></span> Backend</a>
                            <a href="#"
                               class="list-group-item list-group-item-action border-0 d-flex align-items-center"><span
                                    class="bullet bullet-success mr-1"></span> Doc</a>
                            <a href="#"
                               class="list-group-item list-group-item-action border-0 d-flex align-items-center"><span
                                    class="bullet bullet-danger mr-1"></span> Bug</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
                    <div class="modal-content">
                        <section class="todo-form">
                            <form id="form-add-todo" class="todo-input" method="post"
                                  action="{{route('dashboard.todo.store')}}">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="todo-item-action ml-auto">
                                        <a class='todo-item-info'><i class="feather icon-info"></i></a>
                                        <a class='todo-item-favorite'><i class="feather icon-star"></i></a>
                                        <div class="dropdown todo-item-label">
                                            <i class="dropdown-toggle mr-0 mb-1 feather icon-tag" id="todoLabel"
                                               data-toggle="dropdown">
                                            </i>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="todoLabel">
                                                <div class="dropdown-item">
                                                    <div class="vs-checkbox-con">
                                                        <input type="checkbox" data-color="primary"
                                                               data-value="Frontend">
                                                        <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check mr-0"></i>
                                                                    </span>
                                                                </span>
                                                        <span>Frontend</span>
                                                    </div>
                                                </div>
                                                <div class="dropdown-item">
                                                    <div class="vs-checkbox-con">
                                                        <input type="checkbox" data-color="warning"
                                                               data-value="Backend">
                                                        <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check mr-0"></i>
                                                                    </span>
                                                                </span>
                                                        <span>Backend</span>
                                                    </div>
                                                </div>
                                                <div class="dropdown-item">
                                                    <div class="vs-checkbox-con">
                                                        <input type="checkbox" data-color="success" data-value="Doc">
                                                        <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check mr-0"></i>
                                                                    </span>
                                                                </span>
                                                        <span>Doc</span>
                                                    </div>
                                                </div>
                                                <div class="dropdown-item">
                                                    <div class="vs-checkbox-con">
                                                        <input type="checkbox" data-color="danger" data-value="Bug">
                                                        <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check mr-0"></i>
                                                                    </span>
                                                                </span>
                                                        <span>Bug</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <fieldset class="form-group">
                                        <input type="text" class="new-todo-item-title form-control" placeholder="Name"
                                               name="name">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <textarea class="new-todo-item-desc form-control" rows="3"
                                                  placeholder="Add description" name="description"></textarea>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <select name="parent_id" class="form-control">
                                            <option value="NULL" selected>NULL</option>
                                            @foreach($todo as $task)
                                                <option value="{{$task->id}}">{{$task->name}}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="modal-footer">
                                    <fieldset class="form-group position-relative has-icon-left mb-0">
                                        <button type="button" class="btn btn-primary add-todo-item" id="addTaskBtn"
                                                data-dismiss="modal"><i
                                                class="feather icon-check d-block d-lg-none"></i>
                                            <span class="d-none d-lg-block">Add Task</span></button>
                                    </fieldset>
                                    <fieldset class="form-group position-relative has-icon-left mb-0">
                                        <button type="button" class="btn btn-outline-light" data-dismiss="modal"><i
                                                class="feather icon-x d-block d-lg-none"></i>
                                            <span class="d-none d-lg-block">Cancel</span></button>
                                    </fieldset>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="content-right">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="app-content-overlay"></div>
                <div class="todo-app-area">
                    <div class="todo-app-list-wrapper">
                        <div class="todo-app-list">
                            <div class="app-fixed-search">
                                <div class="sidebar-toggle d-block d-lg-none"><i class="feather icon-menu"></i></div>
                                <fieldset class="form-group position-relative has-icon-left m-0">
                                    <input type="text" class="form-control" id="todo-search" placeholder="Search..">
                                    <div class="form-control-position">
                                        <i class="feather icon-search"></i>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="todo-task-list list-group">
                                <ul class="todo-task-list-wrapper media-list">
                                    @foreach($todo as $task)
                                        <li class="todo-item @if($task->is_checked) completed @endif"
                                            data-toggle="modal" data-target="#editTaskModal" data-task-id="{{$task->id}}" data-parent-id="{{$task->parent_id}}" data-update-route="{{route('dashboard.todo.update',$task->id)}}" data-delete-route="{{route('dashboard.todo.destroy',$task->id)}}" data-status-route="{{route('dashboard.todo.status',$task->id)}}">
                                            <div class="todo-title-wrapper d-flex justify-content-between mb-50">
                                                <div class="todo-title-area d-flex align-items-center">
                                                    <div class="title-wrapper d-flex">
                                                        <div class="vs-checkbox-con">
                                                            <input type="checkbox" @if($task->is_checked) checked @endif>
                                                            <span class="vs-checkbox vs-checkbox-sm">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                        </div>
                                                        <h6 class="todo-title mt-50 mx-50">{{$task->name}}</h6>
                                                    </div>
                                                    <div class="chip-wrapper">
                                                        <div class="chip mb-0">
                                                            <div class="chip-body">
                                                                <span class="chip-text" data-value="Frontend"><span
                                                                        class="bullet bullet-primary bullet-xs"></span> Frontend</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="float-right todo-item-action d-flex">
                                                    <a class='todo-item-info'><i class="feather icon-info"></i></a>
                                                    <a class='todo-item-favorite'><i class="feather icon-star"></i></a>
                                                    <a class='todo-item-delete' data-route="{{route('dashboard.todo.destroy',$task->id)}}"><i class="feather icon-trash"></i></a>
                                                </div>
                                            </div>
                                            <p class="todo-desc truncate mb-0">{{$task->description}}</p>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="no-results">
                                    <h5>No Items Found</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="editTaskModal" tabindex="-1" role="dialog" aria-labelledby="editTodoTask"
                     aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
                        <div class="modal-content">
                            <section class="todo-form">
                                <form id="form-edit-todo" class="todo-input" onsubmit="event.preventDefault();">
                                    @method('PATCH')
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editTodoTask">Edit Task</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="todo-item-action ml-auto">
                                            <a class='edit-todo-item-info todo-item-info'><i
                                                    class="feather icon-info"></i></a>
                                            <a class='edit-todo-item-favorite todo-item-favorite'><i
                                                    class="feather icon-star"></i></a>
                                            <div class="dropdown todo-item-label">
                                                <i class="dropdown-toggle mr-0 mb-1 feather icon-tag" id="todoEditLabel"
                                                   data-toggle="dropdown">
                                                </i>
                                                <div class="dropdown-menu dropdown-menu-right"
                                                     aria-labelledby="todoEditLabel">
                                                    <div class="dropdown-item">
                                                        <div class="vs-checkbox-con">
                                                            <input type="checkbox" data-color="primary"
                                                                   data-value="Frontend">
                                                            <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check mr-0"></i>
                                                                        </span>
                                                                    </span>
                                                            <span>Frontend</span>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown-item">
                                                        <div class="vs-checkbox-con">
                                                            <input type="checkbox" data-color="warning"
                                                                   data-value="Backend">
                                                            <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check mr-0"></i>
                                                                        </span>
                                                                    </span>
                                                            <span>Backend</span>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown-item">
                                                        <div class="vs-checkbox-con">
                                                            <input type="checkbox" data-color="success"
                                                                   data-value="Doc">
                                                            <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check mr-0"></i>
                                                                        </span>
                                                                    </span>
                                                            <span>Doc</span>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown-item">
                                                        <div class="vs-checkbox-con">
                                                            <input type="checkbox" data-color="danger" data-value="Bug">
                                                            <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check mr-0"></i>
                                                                        </span>
                                                                    </span>
                                                            <span>Bug</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <fieldset class="form-group">
                                            <input type="text" class="edit-todo-item-title form-control"
                                                   placeholder="Title" name="name">
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <textarea class="edit-todo-item-desc form-control" rows="3"
                                                      placeholder="Add description" name="description"></textarea>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <select name="parent_id" class="form-control">
                                                <option value="NULL" selected>NULL</option>
                                                @foreach($todo as $task)
                                                    <option value="{{$task->id}}">{{$task->name}}</option>
                                                @endforeach
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="modal-footer">
                                        <fieldset class="form-group position-relative has-icon-left mb-0">
                                            <button type="button" class="btn btn-primary update-todo-item" id="updateTaskBtn"
                                                    data-dismiss="modal"><i
                                                    class="feather icon-edit d-block d-lg-none"></i>
                                                <span class="d-none d-lg-block">Update</span></button>
                                        </fieldset>
                                        <fieldset class="form-group position-relative has-icon-left mb-0">
                                            <button type="button" class="btn" data-dismiss="modal"><i
                                                    class="feather icon-x d-block d-lg-none"></i>
                                                <span class="d-none d-lg-block">Cancel</span></button>
                                        </fieldset>
                                    </div>
                                </form>
                            </section>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop
