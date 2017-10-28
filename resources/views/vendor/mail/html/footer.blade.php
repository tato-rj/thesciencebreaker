<tr>
    <td>
        <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0">
        	<tr>
        		<td class="content-cell pt-3" align="center">
        			<h3>Download our mobile app on <a href="#">iPhone</a></h3>
        		</td>
        	</tr>
        	<tr>
        		<td class="content-cell text-center" align="center">
        			<div class="d-flex align-items-center justify-content-center social">
        				<img src="https://www.thesciencebreaker.com/_files/images/social_icons/facebook-email.png">
        				<img src="https://www.thesciencebreaker.com/_files/images/social_icons/twitter-email.png">
        				<img src="https://www.thesciencebreaker.com/_files/images/social_icons/google-plus-email.png">
        			</div>	
        		</td>
        	</tr>
        	<tr>
        		<td class="content-cell links pb-1 pt-1" align="center">
        			<small><a href="#">unsubscribe</a> | <a href="#">privacy policy</a> | <a href="#">contact support</a></small>
        		</td>
        	</tr>
        	<tr>
        		<td class="content-cell" align="center">
        			<p>30, Quai Ernest-Ansermet 1211 Genève 4</p>
        		</td>
        	</tr>
            <tr>
                <td class="content-cell pb-3" align="center">
                    {{ Illuminate\Mail\Markdown::parse($slot) }}
                </td>
            </tr>
        </table>
    </td>
</tr>
