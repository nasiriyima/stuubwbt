{!! Form::open(array('url' => url('admin/add-school'),'class'=>'sky-form', 'id'=>'sky-form')) !!}
<fieldset>
    <div class="row">
        <div class="col-md-3">
            <section>
                <label class="input">
                    <span>CODE</span>
                    <input rows="2" name="code" placeholder="Code" required></input>
                </label>
            </section>
        </div>
        <div class="col-md-9">
            <section>
                <label class="input">
                    <span>School Name</span>
                    <input rows="2" name="name" placeholder="School Name" required></input>
                </label>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <section>
                <label class="textarea">
                    <span>DESCRIPTION</span>
                    <textarea rows="2" name="description" placeholder="School Description" required></textarea>
                </label>
            </section>
        </div>
    </div>
</fieldset>
<footer>
    <div class="pull-right">
        <button type="submit" class="btn-u">Save</button>
    </div>
</footer>
{!! Form::close() !!}