<div style="display:inline; height:50%; width:25%; border:0px solid #fff; position:absolute; bottom:25px; left:10%; padding-right:5px;">
    <table style="height:100%; width:100%; padding-right:5px; padding-bottom:5px;" class="contactForm">
        <tr>
            <td><input id="contact_name" type=text style="float:left;" onkeydown="clearContactValidationErrors(this)" placeholder="Name"/></td>
            <td><input id="contact_subject" type=text style="float:right;" onkeydown="clearContactValidationErrors(this)" placeholder="Subject"/></td>
        </tr>
        <tr>
            <td colspan=2 style="height:100%;">
                <textarea id="contact_message" onkeydown="clearContactValidationErrors(this)" placeholder="Message"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan=2><input id="contact_submit" style="cursor:pointer" onclick="submitContactForm()" type=button value="Send"/></td>
        </tr>
    </table>
</div>