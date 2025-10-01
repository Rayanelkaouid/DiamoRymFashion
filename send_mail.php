<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "relkaouid@gmail.com";
    $subject = "Nouveau message de votre site DIAMO RYM FASHION";

    $name = strip_tags(trim($_POST["Nom"]));
    $email = filter_var(trim($_POST["Email"]), FILTER_SANITIZE_EMAIL);
    $phone = strip_tags(trim($_POST["Téléphone"]));
    $message = strip_tags(trim($_POST["Message"]));

    $body = "Nom : $name\n";
    $body .= "Email : $email\n";
    $body .= "Téléphone : $phone\n\n";
    $body .= "Message :\n$message\n";

    $headers = "From: $email";

    if(mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Message envoyé avec succès !');window.location.href='contact.html';</script>";
    } else {
        echo "<script>alert('Une erreur est survenue. Veuillez réessayer.');window.location.href='contact.html';</script>";
    }
} else {
    header("Location: contact.html");
}
?>
