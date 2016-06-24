<div class="row">
    <div class="panel-body">
        <form action="{{ url('student/edit-profile') }}" method="post" class="sky-form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="type" value="{{ $type }}" >
            <header>{{ strtoupper($type) }}</header>

            <fieldset {{ ($type == 'description')? '': 'style=display:none'}}>
                @if($hasProfilePicture)
                <section>
                    <img class="img-responsive md-margin-bottom-10" id="image_edit"  width="219.31" height="221.3" src="{{ (isset($user->profile->image) && $user->profile->image !="" && $user->profile->image !=NULL)? url('student/file').'/'.$user->profile->image : asset('public/assets/img/team/img32-md.jpg') }}" alt="{{ $user->first_name }}">
                    <a class="btn-u btn-u-sm btn-u-red" onclick="removePicture();" href="#">Remove Picture</a>
                    <input type="hidden" name="remove_picture" id="remove_picture" value="remove_picture" disabled />
                </section>
                @endif
                <section>
                    <label class="label">Edit Description</label>
                    <label class="textarea textarea-expandable">
                        <textarea rows="3" name="description">{{ isset($user->profile->description)? $user->profile->description : ''}}</textarea>
                    </label>
                    <div class="note"><strong>Note:</strong> expands on focus.</div>
                </section>
            </fieldset>
            <fieldset {{ ($type == 'social_contact')? '': 'style=display:none'}}>
                @if(isset($user->profile->social_contact) && $user->profile->social_contact != "")
                <section>
                    <label class="label">Existing Social Media Contacts</label>
                    <label class="select">
                            {{--*/
                                    $social_contact = $user->profile->social_contact;
                                    $contacts = json_decode($social_contact);
                                    $existing = [];
                             /*--}}
                            <select data-placeholder="Existing social contacts" multiple style="width: 806px;" name="existing_social_contacts[]" aria-multiselectable="true" class="chosen-select">
                                @foreach($contacts as $contact_type => $contact)
                                    {{--*/ array_push($existing, strtolower($contact_type)); /*--}}
                                        <option value="{{ json_encode([$contact_type => $contact]) }}" selected>{{ $contact->name }}</option>
                                @endforeach
                            </select>
                    </label>
                    <div class="note"><strong>Note:</strong> Removing options from list deletes existing social contacts.</div>
                </section>
                @endif
                <section>
                    <label class="label">Social Contact Type</label>
                    <label class="select">
                        @if(isset($user->profile->social_contact) && $user->profile->social_contact != "")
                            <select name="social_contact_type">
                                <option value="">Choose a social contact type</option>
                                @foreach($social_contact_types as $social_contact_type)
                                    @if(!in_array(strtolower($social_contact_type->name), $existing))
                                        <option value="{{ json_encode([$social_contact_type->name => [
                                        'icon' => $social_contact_type->icon
                                        ]
                                        ]) }}">{{ $social_contact_type->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        @else
                            <select name="social_contact_type">
                                <option value="">Choose a social contact type</option>
                                @foreach($social_contact_types as $social_contact_type)
                                    <option value="{{ json_encode([$social_contact_type->name => [
                                        'icon' => $social_contact_type->icon
                                        ]
                                        ]) }}">{{ $social_contact_type->name }}</option>
                                @endforeach
                            </select>
                        @endif
                    </label>
                </section>
                <div class="row">
                    <section class="col col-6">
                        <label class="label">Social Contact Name</label>
                        <label class="input">
                            <i class="icon-append fa fa-user"></i>
                            <input type="text" name="social_contact_name" value="" placeholder="Social Media Name">
                        </label>
                    </section>
                    <section class="col col-6">
                        <label class="label">Social Contact Address</label>
                        <label class="input">
                            <i class="icon-append fa fa-globe"></i>
                            <input type="url" name="social_contact_address" value="" placeholder="Social contact address or link to page">
                        </label>
                    </section>
                </div>
            </fieldset>
            <fieldset {{ ($type == 'education')? '': 'style=display:none'}}>
                @if(isset($user->profile->education) && $user->profile->education != "")
                    <section>
                        <label class="label">Existing Educational Information</label>
                        <label class="select">
                            {{--*/
                                    $education_information = $user->profile->education;
                                    $education = json_decode($education_information);
                                    $existing = [];
                             /*--}}
                            <select data-placeholder="Existing Educational Information" multiple style="width: 806px;" name="existing_education[]" aria-multiselectable="true" class="chosen-select">
                                @foreach($education as $school => $estimated_date)
                                    {{--*/ array_push($existing, strtolower($school)); /*--}}
                                    <option value="{{ json_encode([$school => $estimated_date]) }}" selected>{{ $school }}</option>
                                @endforeach
                            </select>
                        </label>
                        <div class="note"><strong>Note:</strong> Removing options from list deletes existing educational information.</div>
                    </section>
                @endif
                <div class="row">
                    <section class="col col-6">
                        <label class="label">School</label>
                            <label class="select">
                            @if(isset($user->profile->school_id) && $user->profile->school_id != "" && $user->profile->education != '' && $user->profile->education != null)
                                <select name="school_id">
                                    <option value="">Choose school</option>
                                    @foreach($schools as $school)
                                        @if(!in_array(strtolower($school->name), $existing))
                                            <option value="{{ $school->id }}">{{ $school->code }} - {{ $school->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            @else
                                <select name="school_id">
                                    <option value="">Choose a school</option>
                                    @foreach($schools as $school)
                                        <option value="{{ $school->id }}"
                                        {{ (isset($user->profile) && $user->profile->school_id == $school->id)? 'selected' : '' }}>{{ $school->code }} - {{ $school->name }}</option>
                                    @endforeach
                                </select>
                            @endif
                            </label>
                    </section>

                    <section class="col col-6">
                        <label class="label">Estimated Completion Date</label>
                        <label class="input">
                            <i class="icon-append fa fa-calendar"></i>
                            <input type="text" name="endDate" id="finish" value="" placeholder="End date">
                        </label>
                    </section>
                </div>
            </fieldset>
            <fieldset {{ ($type == 'name')? '': 'style=display:none'}}>
                <section>
                    <label class="label">Name</label>
                    <label class="input">
                        <i class="icon-append fa fa-user"></i>
                        <input type="text" value="{{ $user->first_name }}" name="first_name" placeholder="Placeholder text">
                    </label>
                </section>
            </fieldset>
            <fieldset {{ ($type == 'nick_name')? '': 'style=display:none'}}>
                <section>
                    <label class="label">Nick Name</label>
                    <label class="input">
                        <i class="icon-append fa fa-user"></i>
                        <input type="text" value="{{ $user->profile->nick_name or '' }}" name="nick_name" placeholder="Nick Name ">
                    </label>
                </section>
            </fieldset>
            <fieldset {{ ($type == 'DofB')? '': 'style=display:none'}}>
                <section>
                    <label class="label">Date of Birth</label>
                    <label class="input">
                        <i class="icon-append fa fa-calendar"></i>
                        <input type="text" name="dofb" id="start" value="{{ isset($user->profile->dofb)? \Carbon\Carbon::createFromTimestamp(strtotime($user->profile->dofb))->format('Y.m.d') : '' }}" placeholder="Date of Birth">
                    </label>
                </section>
            </fieldset>
            <fieldset {{ ($type == 'email')? '': 'style=display:none'}}>
                <section>
                    <label class="label">Secondary Email Address</label>
                    <label class="input">
                        <i class="icon-append fa fa-envelope"></i>
                        <input type="email" value="{{ $user->profile->email or '' }}" name="email">
                    </label>
                </section>
            </fieldset>
            <fieldset {{ ($type == 'phone')? '': 'style=display:none'}}>
                <section>
                    <label class="label">Phone</label>
                    <label class="input">
                        <i class="icon-append fa fa-phone"></i>
                        <input type="tel" name="phone" value="{{ $user->profile->phone or '' }}" id="phone">
                    </label>
                </section>
            </fieldset>
            <fieldset {{ ($type == 'address')? '': 'style=display:none'}}>
                <section>
                    <label class="label">Address</label>
                    <label class="textarea">
                        <i class="icon-append fa fa-university"></i>
                        <textarea rows="3" placeholder="Placeholder text" name="address">{{ $user->profile->address or '' }}</textarea>
                    </label>
                </section>
            </fieldset>
            <footer>
                <div class="pull-right">
                    <button type="button" class="btn-u btn-u-default" data-dismiss="modal" data-target=".bs-example-modal-lg">Back</button>
                    <button type="submit" class="btn-u">Submit</button>
                </div>
            </footer>
        </form>
        <!-- General Unify Forms -->
    </div>

    <div class="margin-bottom-60"></div>
</div>
<script type="text/javascript">
    function removePicture(){
        $("#image_edit").prop("src", "{!! asset('public/assets/img/team/img32-md.jpg') !!}");
        $("#image_edit").prop("width", "219.31");
        $("#image_edit").prop("height", "221.3");
        $("#remove_picture").prop("disabled", false);
    }
    jQuery(document).ready(function() {
        $('.chosen-select', this).chosen('destroy').chosen();
        $("#finish").datepicker({
            minDate: 0,
            dateFormat: 'dd.mm.yy'
        });
        Datepicker.initDatepicker();

        $("select[name=social_contact_type]").on("change", function(){
            if($(this).val()){
                $("input[name=social_contact_name]").prop("required", true);
                $("input[name=social_contact_address]").prop("required", true);
            } else {
                $("input[name=social_contact_name]").prop("required", false);
                $("input[name=social_contact_address]").prop("required", false);
            }
        });

        $("select[name=school_id]").on("change", function(){
            if($(this).val()){
                $("input[name=endDate]").prop("required", true);
            } else {
                $("input[name=endDate]").prop("required", false);
            }
        });
    });
</script>