<div class="cd-user-modal">
    <div class="cd-user-modal-container"> <!-- this is the container wrapper -->
        <ul class="cd-switcher">
                <li><a href="javascript:void(0);">Login</a></li>
                <li><a href="javascript:void(0);">Register</a></li>
        </ul>

        <div id="cd-login"> <!-- log in form -->
            <?php echo Form::open(array('url' => url('auth/authenticate'),'class'=>'cd-form')); ?>

                <p class="fieldset">
                        <label class="image-replace cd-email" for="signin-email">E-mail</label>
                        <input class="full-width has-padding has-border" id="signin-email" type="email" placeholder="E-mail" name="email">
                        <span class="cd-error-message">Error message here!</span>
                </p>

                <p class="fieldset">
                        <label class="image-replace cd-password" for="signin-password">Password</label>
                        <input class="full-width has-padding has-border" id="signin-password" type="password" name="password"  placeholder="Password">
                        <span class="cd-error-message">Error message here!</span>
                </p>

                <p class="fieldset">
                        <input type="checkbox" id="remember-me">
                        <label for="remember-me">Remember me</label>
                </p>

                <p class="fieldset">
                        <input class="full-width" type="submit" value="Login">
                </p>
            <?php echo Form::close(); ?>

        <p class="cd-form-bottom-message"><a href="javascript:void(0);">Forgot your password?</a></p>
        </div>

        <div id="cd-signup">
                <?php echo Form::open(array('url' => url('auth/registration'),'class'=>'cd-form')); ?>

                    <p class="fieldset">
                        <label class="image-replace cd-username" for="signup-username">Name</label>
                        <input class="full-width has-padding has-border" id="signup-username" type="text" name="name" placeholder="Name">
                        <span class="cd-error-message">Error message here!</span>
                    </p>
                    
                    <p class="fieldset">
                        <label class="image-replace cd-email" for="signup-email">E-mail</label>
                        <input class="full-width has-padding has-border" id="signup-email" type="email" name="email" placeholder="E-mail">
                        <span class="cd-error-message">Error message here!</span>
                    </p>
                    
                    <p class="fieldset">
                        <label class="image-replace cd-password" for="signup-password">Password</label>
                        <input class="full-width has-padding has-border" id="signup-password" type="password" name="password" placeholder="Password">
                        <span class="cd-error-message">Error message here!</span>
                    </p>
                        
                    <p class="fieldset">
                        <input type="checkbox" id="accept-terms">
                        <label for="accept-terms">I agree to the <a href="#">Terms and Conditions</a></label>
                    </p>

                    <p class="fieldset">
                        <input class="full-width has-padding" type="submit" value="Register">
                    </p>
                <?php echo Form::close(); ?>


                <!-- <a href="javascript:void(0);" class="cd-close-form">Close</a> -->
        </div>

                <div id="cd-reset-password"> <!-- reset password form -->
                        <p class="cd-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>

                        <form class="cd-form">
                                <p class="fieldset">
                                        <label class="image-replace cd-email" for="reset-email">E-mail</label>
                                        <input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="E-mail">
                                        <span class="cd-error-message">Error message here!</span>
                                </p>

                                <p class="fieldset">
                                        <input class="full-width has-padding" type="submit" value="Reset password">
                                </p>
                        </form>

                        <p class="cd-form-bottom-message"><a href="javascript:void(0);">Back to log-in</a></p>
                </div> <!-- cd-reset-password -->
                <a href="javascript:void(0);" class="cd-close-form">Close</a>
        </div> <!-- cd-user-modal-container -->
</div> <!-- cd-user-modal -->