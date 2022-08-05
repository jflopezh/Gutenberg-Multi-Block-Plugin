import { __ } from '@wordpress/i18n';
import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

export default function save() {
	return (
		<div { ...useBlockProps.save() } >
			<InnerBlocks.Content />
			<div class="login">
				<form name="loginform" id="loginform" action="http://wordpress.com.devel/wp-login.php" method="post">
					<p class="login-username">
						<label for="user_login">{ __('Username or Email Address' , 'g-blocks') }</label>
						<input type="text" name="log" id="user_login" autocomplete="username" class="input" value="" size="20" />
					</p>
					<p class="login-password">
						<label for="user_pass">{ __('Password' , 'g-blocks') }</label>
						<input type="password" name="pwd" id="user_pass" autocomplete="current-password" class="input" value="" size="20" />
					</p>
					<p class="login-remember">
						<label>
							<input name="rememberme" type="checkbox" id="rememberme" value="forever" /> { __('Remember Me' , 'g-blocks') }
						</label>
					</p>
					<p class="login-submit">
						<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary" value={ __('Log In' , 'g-blocks') } />
						<input type="hidden" name="redirect_to" value="http://wordpress.com.devel/prueba/" />
					</p>
				</form>
				<div class="alternative">
					<span>
					{ __('Don\'t have an account?' , 'g-blocks') }
					</span>
				</div>
				<button id="create-account">Create Account</button>
			</div>
			<div class="creat-account">
				<form id="registration_form" class="create-account-form" action="" method="POST">
					<fieldset>
						<p>
							<label for="user_Login">{ __('Username' , 'g-blocks') }</label>
							<input name="user_login" id="user_login" class="user_login" type="text"/>
						</p>
						<p>
							<label for="user_email">{ __('Email' , 'g-blocks') }</label>
							<input name="user_email" id="user_email" class="user_email" type="email"/>
						</p>
						<p>
							<label for="user_first">{ __('First Name' , 'g-blocks') }</label>
							<input name="user_first" id="user_first" type="text" class="user_first" />
						</p>
						<p>
							<label for="user_last">{ __('Last Name' , 'g-blocks') }</label>
							<input name="user_last" id="user_last" type="text" class="user_last"/>
						</p>
						<p>
							<label for="password">{ __('Password' , 'g-blocks') }</label>
							<input name="user_pass" id="password" class="password" type="password"/>
						</p>
						<p>
							<label for="password_again">{ __('Password Again' , 'g-blocks') }</label>
							<input name="user_pass_confirm" id="password_again" class="password_again" type="password"/>
						</p>
						<p>
							<input type="submit" value={ __('Register Your Account') }/>
						</p>
					</fieldset>
				</form>
				<div class="alternative">
					<span>
						{ __('Already have an account?' , 'g-blocks') }
					</span>
				</div>
				<button id="login">Login</button>
			</div>
		</div>
	);
}
