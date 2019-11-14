<tr>
    <td>
        <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0">
        	<tr>
        		<td class="content-cell text-center" align="center">
        			<div class="social">
                        <a href="{{ config('app.facebook') }}">
                            <img src="{{ config('app.url') }}/images/emails/facebook.png">
                        </a>
                        <a href="{{ config('app.twitter') }}">
                            <img src="{{ config('app.url') }}/images/emails/twitter.png">
                        </a>
                        <a href="{{ config('app.googleplus') }}">
                            <img src="{{ config('app.url') }}/images/emails/google-plus.png">
                        </a>
        			</div>	
        		</td>
        	</tr>
        	<tr>
        		<td class="content-cell links pb-1 pt-1" align="center">
        			<small><a href="{{ config('app.url') }}/unsubscribe">unsubscribe</a> | <a href="https://www.iubenda.com/privacy-policy/7974803">privacy policy</a> | <a href="{{ config('app.url') }}/contact/ask-a-question">contact support</a></small>
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
