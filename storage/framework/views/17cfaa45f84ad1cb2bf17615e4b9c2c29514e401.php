<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Details</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f5f5ff; margin: 0; padding: 0;">
    <table width="100%" height="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #f5f5ff; width: 100%; height: 100%; margin: 0; padding: 0; border-collapse: collapse;">
        <tr>
            <td align="center" valign="middle">
                <div style="background-color: #fff; padding: 30px; max-width: 400px; text-align: center; border-radius: 15px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);">
                    <img src="https://rallylly.vercel.app/_next/image/?url=%2F_next%2Fstatic%2Fmedia%2Flogodark.3e68d264.jpg&w=1080&q=75" alt="Logo" style="height:80px">
                    <h1 style="font-size: 1.2rem; color: #243475; margin-bottom: 10px;">Dear <?php echo e($flightDetail->firstName); ?>,</h1>
                    <p style="font-size: 1rem; color: #243475; margin: 10px 0;">We are excited to confirm your registration for the 36th International Air Gathering in Tunisia!</p>
                    <p style="font-size: 1rem; color: #243475; margin: 10px 0;">Thank you for your participation. We look forward to welcoming you to this exceptional event.</p>
                    <p style="font-size: 1rem; color: #243475; margin: 10px 0;">If you have any questions or need further information, please feel free to contact us at act@aerorallyes.com.</p>
                    <p style="font-size: 1rem; color: #243475; margin: 10px 0;">Best regards.</p>
                    <p style="font-size: 0.8rem; color: #aaa; margin-top: 20px;">© 2024 aerorallyes. All rights reserved.</p>
                </div>
            </td>
        </tr>
    </table>
</body>
</html>
<?php /**PATH /home/aeroralltt/admin/resources/views/emails/flightDetailsDone.blade.php ENDPATH**/ ?>