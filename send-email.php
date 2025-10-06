<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = htmlspecialchars($_POST["name"]);
    $email    = htmlspecialchars($_POST["email"]);
    $phone    = htmlspecialchars($_POST["phone"]);
    $company  = htmlspecialchars($_POST["company"]);
    $goals    = htmlspecialchars($_POST["goals"]);
    $plan     = htmlspecialchars($_POST["plan"]);

    // 🔁 Set your Gmail here
    $to = "mdunaluphumulo@gmail.com";

    $subject = "New Booking - $plan";

    $message = "
    You received a new booking on Fly Media.

    Name: $name
    Email: $email
    Phone: $phone
    Company: $company
    Plan: $plan

    Goals:
    $goals
    ";

    // ✨ Use a valid sender (you can still use a domain-free one here, but better with your domain)
    $headers = "From: FLY MEDIA <noreply@yourdomain.com>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send mail
    if (mail($to, $subject, $message, $headers)) {
        echo "<script>alert('Thank you! Your booking was sent.'); window.location.href='thank-you.html';</script>";
    } else {
        echo "<script>alert('Failed to send. Please try again later.'); history.back();</script>";
    }
}
?>
