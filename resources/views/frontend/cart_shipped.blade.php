<p style="font-size: 12px;						
font-weight: 400;
color: #6f6f72;">
{{Auth::user()->firstname??''}} {{Auth::user()->lastname??''}}<br>
{{Auth::user()->address??''}}<br>
{{Auth::user()->city??''}} - {{Auth::user()->state??''}}<br>

Pincode-{{Auth::user()->pincode??''}}
<br>Phone: +91-{{Auth::user()->phone??''}}
<br>Email: {{Auth::user()->email??''}}
</p>  