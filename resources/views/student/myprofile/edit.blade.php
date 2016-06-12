<div class="row">
    <div class="panel-body">
        <form action="{{ url('student/edit-profile') }}" method="post" class="sky-form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <header>{{ strtoupper($type) }}</header>

            <fieldset {{ ($type == 'description')? '': 'style=display:none'}}>
                <section>
                    <label class="label">Edit Description</label>
                    <label class="textarea textarea-expandable">
                        <textarea rows="3">{{ isset($user->profile->description)? $user->profile->description : ''}}</textarea>
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
                            <select name="social_contact">
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
                            <select name="social_contact">
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
                <div class="row">
                    <section class="col col-6">
                        <label class="label">School</label>
                        <label class="select">
                            <i class="icon-append fa fa-mortar-board"></i>
                            <select>
                                <option value="">Choose a school</option>
                                @foreach($schools as $school)
                                    <option value="{{ $school->id }}">{{ $school->code }} - {{ $school->name }}</option>
                                @endforeach
                            </select>
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
    jQuery(document).ready(function() {
        $('.chosen-select', this).chosen('destroy').chosen();
        Datepicker.initDatepicker();
    });
</script>