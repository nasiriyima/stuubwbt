<div class="row">
    <form action="#" class="sky-form">
        <header><?php echo e(strtoupper($type)); ?></header>

        <fieldset <?php echo e(($type == 'description')? '': 'style=display:none'); ?>>
            <section>
                <label class="label">Edit Description</label>
                <label class="textarea textarea-expandable">
                    <textarea rows="3"><?php echo e(isset($user->profile->description)? $user->profile->description : ''); ?></textarea>
                </label>
                <div class="note"><strong>Note:</strong> expands on focus.</div>
            </section>
        </fieldset>
        <fieldset <?php echo e(($type == 'social_contact')? '': 'style=display:none'); ?>>
            <section>
                <label class="label">Social Contact Type</label>
                <label class="select">
                    <?php if(isset($user->profile->social_contact) && $user->profile->social_contact != ""): ?>
                        <?php /**/
                                $social_contact = $user->profile->social_contact;
                                $contacts = json_decode($social_contact);
                                $existing = [];
                                foreach($contacts as $contact_type => $contact){
                                    array_push($existing, strtolower($contact_type));
                                }
                         /**/ ?>
                        <select>
                            <option value="0">Choose a social contact type</option>
                            <?php foreach($social_contact_types as $social_contact_type): ?>
                                <?php if(!in_array(strtolower($social_contact_type->name), $existing)): ?>
                                    <option value="<?php echo e($social_contact_type->name); ?>"><?php echo e($social_contact_type->name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    <?php else: ?>
                        <select>
                            <option value="0">Choose a social contact type</option>
                            <?php foreach($social_contact_types as $social_contact_type): ?>
                            <option value="<?php echo e($social_contact_type->name); ?>"><?php echo e($social_contact_type->name); ?></option>
                            <?php endforeach; ?>
                        </select>
                    <?php endif; ?>
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