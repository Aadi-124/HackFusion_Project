import smtplib
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText
import sys


def send_email(subject, body, to_email, smtp_server, smtp_port, sender_email, sender_password):
    # Create the MIME object
    message = MIMEMultipart()
    message['From'] = sender_email
    message['To'] = to_email
    message['Subject'] = subject

    # Attach the body of the email
    message.attach(MIMEText(body, 'plain'))

    # Connect to the SMTP server
    with smtplib.SMTP(smtp_server, smtp_port) as server:
        # Start TLS for security
        server.starttls()
        
        # Log in to the email account
        server.login(sender_email, sender_password)

        # Send the email
        server.sendmail(sender_email, to_email, message.as_string())

# Set your email details
subject = "You're in!Registration Successfull...!"
body = "Hi, You're officially part of the SGGSIE&T Social Media family! Get ready to connect, share, and explore with us."
to_email = sys.argv[1]
smtp_server = "smtp.gmail.com"
smtp_port = 587

sender_email = "kartikeshtaware143@gmail.com"
sender_password = 'epne lgtl qvyx snee'

# Send the email
send_email(subject, body, to_email, smtp_server, smtp_port, sender_email, sender_password)