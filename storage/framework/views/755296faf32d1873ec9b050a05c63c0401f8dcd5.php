<div class="row">
    <div class="panel-body">
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
                <?php if(isset($user->profile->social_contact) && $user->profile->social_contact != ""): ?>
                <section>
                    <label class="label">Existing Social Media Contacts</label>
                    <label class="select">
                            <?php /**/
                                    $social_contact = $user->profile->social_contact;
                                    $contacts = json_decode($social_contact);
                                    $existing = [];
                             /**/ ?>
                            <select data-placeholder="Existing social contacts" multiple style="width: 806px;" name="social_contacts[]" aria-multiselectable="true" class="chosen-select">
                                <?php foreach($contacts as $contact_type => $contact): ?>
                                    <?php /**/ array_push($existing, strtolower($contact_type)); /**/ ?>
                                        <option value="<?php echo e(json_encode([$contact_type => $contact])); ?>" selected><?php echo e($contact->name); ?></option>
                                <?php endforeach; ?>
                            </select>
                    </label>
                    <div class="note"><strong>Note:</strong> Removing options from list deletes existing social contacts.</div>
                </section>
                <?php endif; ?>
                <section>
                    <label class="label">Social Contact Type</label>
                    <label class="select">
                        <?php if(isset($user->profile->social_contact) && $user->profile->social_contact != ""): ?>
                            <select>
                                <option value="0">Choose a social contact type</option>
                                <?php foreach($social_contact_types as $social_contact_type): ?>
                                    <?php if(!in_array(strtolower($social_contact_type->name), $existing)): ?>
                                        <option value="<?php echo e(json_encode([$social_contact_type->name => [
                                        'icon' => $social_contact_type->icon
                                        ]
                                        ])); ?>"><?php echo e($social_contact_type->name); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        <?php else: ?>
                            <select>
                                <option value="0">Choose a social contact type</option>
                                <?php foreach($social_contact_types as $social_contact_type): ?>
                                    <option value="<?php echo e(json_encode([$social_contact_type->name => [
                                        'icon' => $social_contact_type->icon
                                        ]
                                        ])); ?>"><?php echo e($social_contact_type->name); ?></option>
                                <?php endforeach; ?>
                            </select>
                        <?php endif; ?>
                    </label>
                </section>
                <div class="row">
                    <section class="col col-6">
                        <label class="label">Social Contact Name</label>
                        <label class="input">
                            <i class="icon-append fa fa-user"></i>
                            <input type="text" name="name" value="" placeholder="Social Media Name">
                        </label>
                    </section>
                    <section class="col col-6">
                        <label class="label">Social Contact Address</label>
                        <label class="input">
                            <i class="icon-append fa fa-globe"></i>
                            <input type="text" name="address" value="" placeholder="Social contact address or link to page">
                        </label>
                    </section>
                </div>
            </fieldset>
            <fieldset <?php echo e(($type == 'education')? '': 'style=display:none'); ?>>
                <div class="row">
                    <section class="col col-6">
                        <label class="label">School</label>
                        <label class="select">
                            <i class="icon-append fa fa-mortar-board"></i>
                            <select>
                                <option value="0">Choose a school</option>
                                <?php foreach($schools as $school): ?>
                                    <option value="<?php echo e($school->id); ?>"><?php echo e($school->code); ?> - <?php echo e($school->name); ?></option>
                                <?php endforeach; ?>
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