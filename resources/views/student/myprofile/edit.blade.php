<div class="row">
    <form action="#" class="sky-form">
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
            <section>
                <label class="label">Social Contact Type</label>
                <label class="select">
                    @if(isset($user->profile->social_contact) && $user->profile->social_contact != "")
                        {{--*/
                                $social_contact = $user->profile->social_contact;
                                $contacts = json_decode($social_contact);
                                $existing = [];
                                foreach($contacts as $contact_type => $contact){
                                    array_push($existing, strtolower($contact_type));
                                }
                         /*--}}
                        <select>
                            <option value="0">Choose a social contact type</option>
                            @foreach($social_contact_types as $social_contact_type)
                                @if(!in_array(strtolower($social_contact_type->name), $existing))
                                    <option value="{{ $social_contact_type->name }}">{{ $social_contact_type->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    @else
                        <select>
                            <option value="0">Choose a social contact type</option>
                            @foreach($social_contact_types as $social_contact_type)
                            <option value="{{ $social_contact_type->name }}">{{ $social_contact_type->name }}</option>
                            @endforeach
                        </select>
                    @endif
                    <i></i>
                </label>
            </section>
        </fieldset>
        <footer>
            <button type="submit" class="btn-u">Submit</button>
            <button type="button" class="btn-u btn-u-default" data-dismiss="modal" data-target=".bs-example-modal-lg">Back</button>
        </footer>
    </form>
    <!-- General Unify Forms -->

    <div class="margin-bottom-60"></div>
</div>