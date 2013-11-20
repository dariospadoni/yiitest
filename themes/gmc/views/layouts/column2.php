<?php $this->beginContent('//layouts/main'); ?>

<?php if($this->pageCaption !== '') : ?>

<?php endif; ?>

			<div class="colLeft">
				<?php echo $content; ?>
			</div>
			<div class="colRight" >
                <div id="loginBox">

                    <div class="contactBox_icon lock" > </div>
                    <div class="contactBox_text"> <span> AREA RISERVATA </span> </div>

                    <div class="loginForm">
                        <fieldset>
                            <div class="spacer"></div>
                            <label for="txtUserId">User id</label>
                            <input class="rounded" id="txtUserId" >

                            <div class="spacer"></div>
                            <label for="txtUserPswd">Password</label>
                            <input class="rounded" id="txtUserPswd" type="password" >

                            <small class="remembPswd">Non ricordi la tua password? <a> Clicca qui</a> </small>
                            <div class="loginButton">LOGIN</div>
                        </fieldset>
                    </div>

                </div>

                <div class="navSpacer"></div>


                <div id="newsBox">

                    <div class="contactBox_icon news" ></div>
                    <div class="contactBox_text"> <span> NEWS </span> </div>

                </div>
            </div>

<?php $this->endContent(); ?>