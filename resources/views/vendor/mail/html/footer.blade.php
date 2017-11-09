<tr>
    <td>
        <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0">
        	<tr>
        		<td class="content-cell pt-3" align="center">
        			<h3>Our mobile app is coming soon, stay tuned!</h3>
        		</td>
        	</tr>
        	<tr>
        		<td class="content-cell text-center" align="center">
        			<div class="d-flex align-items-center justify-content-center social">
                        <a href="{{ config('app.facebook') }}">
                            <img src="https://www.thesciencebreaker.com/_files/images/social_icons/facebook-email.png">
                        </a>
                        <a href="{{ config('app.twitter') }}">
                            <img src="https://www.thesciencebreaker.com/_files/images/social_icons/twitter-email.png">
                        </a>
                        <a href="{{ config('app.googleplus') }}">
                            <img src="https://www.thesciencebreaker.com/_files/images/social_icons/google-plus-email.png">
                        </a>
        			</div>	
        		</td>
        	</tr>
        	<tr>
        		<td class="content-cell links pb-1 pt-1" align="center">
        			<small><a href="/unsubscribe">unsubscribe</a> | <a href="https://www.iubenda.com/privacy-policy/7974803" target="_blank">privacy policy</a> | <a href="/contact/ask-a-question" target="_blank">contact support</a></small>
        		</td>
        	</tr>
        	<tr>
        		<td class="content-cell" align="center">
        			<p>30, Quai Ernest-Ansermet 1211 Genève 4</p>
        		</td>
        	</tr>
            <tr>
                <td class="content-cell pb-1" align="center">
                    {{ Illuminate\Mail\Markdown::parse($slot) }}
                </td>
            </tr>
        </table>
    </td>
</tr>
