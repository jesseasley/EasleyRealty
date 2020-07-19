  <form>
    <div class="form-group">
      <label for="nameText">Name: </label>
      <input type="text" id="nameText" class="form-control" placeholder="Tell us your name" value="" />
      <label for="emailText">Email: </label>
      <input type="email" id="emailText" class="form-control" placeholder="Enter an email address so we may respond to you" value="" />
      <label for="phoneText">Phone: </label>
      <input type="number" id="phoneText" class="form-control" placeholder="A contact phone number allows us to call you, if you prefer" value="" />
      <label for="subjectText">Subject: </label>
      <input type="text" id="subjectText" class="form-control" placeholder="You can specify a subject line for the email" value="" />
      <label for="bodyTextArea">Message: </label>
      <textarea rows="5" id="bodyTextArea" class="form-control" placeholder="Tell us what's on your mind"></textarea>
      <center>
        <button type="submit" class="btn btn-default" onclick="submitEmail();">Send E-Mail</button>
      </center>
      <br /><br />
    </div>
  </form>
