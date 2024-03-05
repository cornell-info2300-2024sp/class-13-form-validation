<?php
$page_title = 'Yoko\'s Kitchen';

$nav_cooking_class = 'active_page';

// TODO: 2. initial page state (hide confirmation message)
$show_confirmation_message = true;

// CSS classes for form feedback messages
$feedback_css_classes = array(
  "courses" => 'hidden',
  "email" => 'hidden'
);

// default form values
$form_values = array(
  "course-vegetarian" => "",
  "course-sauces" => "",
  "email" => ""
);

// default sticky values for form inputs
$sticky_values = array(
  "course-vegetarian" => "",
  "course-sauces" => "",
  "email" => ""
);

// Did the user submit the form?
if (true /* TODO: 3. Did the user submit the form? (submit button parameter exists) */) {

  // TODO: 4. Assume the form is valid
  // $form_valid = true;

  // Get HTTP request user data
  $form_values["course-vegetarian"] = isset($_POST['japanese-vegetarian']); // untrusted
  $form_values["course-sauces"] = isset($_POST['sauces-masterclass']); // untrusted
  $form_values["email"] = trim($_POST["email"]); // untrusted

  // TODO: 5. Validate that at least one course checkbox was checked

  // TODO: 6. Validate that the email is not empty (email is required)
  // Note: Do not validate email format.
  //       For project 2 only validate, required or not required.

  if (false /* TODO: 7. If the form is valid, show confirmation message. Otherwise, set sticky values */) {
    // TODO: 8. show confirmation message
  } else {
    // form was not valid, set sticky values
    $sticky_values["course-vegetarian"] = ($form_values["course-vegetarian"] ? 'checked' : "");
    $sticky_values["course-sauces"] = ($form_values["course-sauces"] ? 'checked' : "");
    $sticky_values["email"] = $form_values["email"];
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'includes/meta.php' ?>

<body>
  <?php include 'includes/header.php' ?>

  <main class="courses">

    <h2><?php echo htmlspecialchars($page_title); ?></h2>

    <p>Welcome to Yoko's Kitchen!</p>

    <!-- TODO: 1. conditional render the confirmation message using the $show_confirmation_message variable -->

    <section class="notice">
      <h2>Course Information Request Confirmation</h2>

      <p>Thank you for your interest in our cooking classes!</p>

      <p>We will send information about these courses to you shortly.</p>
    </section>

    <section>
      <h2>Cooking Classes</h2>

      <div class="course-tile">
        <figure>
          <img src="/images/bok-choi.jpg" alt="Bok Choi" />
          <figcaption>Bok Choi</figcaption>
        </figure>
        <div>
          <div>
            <h3>Japanese Vegetarian</h3>
            <h4>Five week course in London</h4>
          </div>
          <p>A five week introduction to traditional Japanese vegetarian meals, teaching you a selection of rice and noodle dishes.</p>
        </div>
      </div>

      <div class="course-tile">
        <figure>
          <img src="/images/teriyaki.jpg" alt="Teriyaki sauce" />
          <figcaption>Teriyaki Sauce</figcaption>
        </figure>
        <div>
          <div>
            <h3>Sauces Masterclass</h3>
            <h4>One day workshop</h4>
          </div>
          <p>An intensive one-day course looking at how to create the most delicious sauces for use in a range of Japanese cookery.</p>
        </div>
      </div>
    </section>

    <section id="request">
      <h2>Request Course Information</h2>

      <p>Interesting in taking one of our cooking classes? Let us know which classes and we'll send you some information!</p>

      <form id="request-form" action="/cooking-classes" method="post" novalidate>

        <div id="feedback-classes" class="feedback <?php echo $feedback_css_classes["courses"]; ?>">Please select one or more classes.</div>

        <div class="form-label">
          <input type="checkbox" name="japanese-vegetarian" id="request-vegetarian" <?php echo $sticky_values["course-vegetarian"]; ?> />
          <label for="request-vegetarian">Japanese Vegetarian</label>
        </div>
        <div class="form-label">
          <input type="checkbox" name="sauces-masterclass" id="request-sauces" <?php echo $sticky_values["course-sauces"]; ?> />
          <label for="request-sauces">Sauces Masterclass</label>
        </div>

        <div id="feedback-email" class="feedback <?php echo $feedback_css_classes["email"]; ?>">Please enter your email address.</div>

        <div class="form-label">
          <label for="request-email">Email:</label>
          <input type="email" name="email" id="request-email" value="<?php echo htmlspecialchars($sticky_values["email"]); ?>" />
        </div>

        <div class="align-right">
          <input id="request-submit" type="submit" value="Request Information" />
        </div>
      </form>
    </section>

    <cite>&copy; 2011 Yoko's Kitchen (<a href="http://www.htmlandcssbook.com/code-samples/chapter-17/example-with-links.html">Source</a>)</cite>
  </main>

  <?php include "includes/footer.php" ?>
</body>

</html>
