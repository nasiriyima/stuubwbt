<div class="row">
    <div class="col-md-1 pull-right">
        <a href="javascript:void(0);" onclick="togglerole()"><i class="fa fa-3x fa-plus" id="addrolebtn"></i></a>
        <a href="javascript:void(0);" onclick="togglerole()"><i class="fa fa-3x fa-ban" style="display: none;" id="addroleclose"></i></a>
    </div>
</div>
<div class="row" id="addrole" style="display:none;">
    <div class="col-md-12">
        <form action="javascript:void(0);" id="sky-form" class="sky-form">
            <header>Checkout form</header>
            <fieldset>
                <div class="row">
                    <section class="col col-6">
                        <label class="input">
                            <input type="text" name="rslug" placeholder="Role Slug">
                        </label>
                    </section>
                    <section class="col col-6">
                        <label class="input">
                            <input type="text" name="rname" placeholder="Role Name">
                        </label>
                    </section>
                </div>
            </fieldset>
            <fieldset>
                <section>
                    @foreach($modules as $module)
                        <h4><strong>{{$module->name}}</strong></h4>
                        <div class="inline-group">
                            @foreach($module->permission as $permission)
                                <div class="col-md-3">
                                    <label class="checkbox"><input type="checkbox" name="radio-inline" class="permission" value="{{$permission->slug}}"><i class="rounded-x" ></i>{{$permission->name}}</label>
                                </div>
                            @endforeach
                        </div>
                        <br/>
                    @endforeach
                </section>
            </fieldset>

            <footer>
                <button type="submit" class="btn-u" onclick="createRole()">Create Role</button>
            </footer>
        </form>
    </div>
</div>
<div class="row" id="listrole">
    <div class="col-md-12">
        <div class="row tab-v3">
            <div class="col-sm-3">
                <ul class="nav nav-pills nav-stacked">
                    {{--*/$count = 1/*--}}
                    @foreach($roles as $role)
                        <li class = "{{($count == 1)? 'active':''}}"><a href="#role-{{$count}}" data-toggle="tab"> {{$role->name}}</a></li>
                        {{--*/$count++/*--}}
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-9">
                <div class="tab-content">
                    {{--*/$count = 1/*--}}
                    @foreach($roles as $role)
                        <div class="tab-pane fade in {{($count == 1)? 'active':''}}" id="role-{{$count}}">
                            {{$role->name}}
                        </div>
                        {{--*/$count++/*--}}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>