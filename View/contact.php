<div class="contact-container">
    <h2>Contact Us</h2>
    <form id="contact-form" class="contact-form">
        <label for="contact-email">Your Email</label>
        <input type="email" id="contact-email" name="email" required placeholder="you@example.com">

        <label for="contact-message">Your Message</label>
        <textarea id="contact-message" name="message" rows="5" required placeholder="Type your message here..."></textarea>

        <button type="submit">Send</button>
    </form>
    <div id="contact-success" class="contact-success" style="display:none;">
        Thank you! Your message has been sent!
    </div>
</div>

<script>
document.getElementById('contact-form').addEventListener('submit', function(e) {
    e.preventDefault();
    document.getElementById('contact-form').style.display = 'none';
    document.getElementById('contact-success').style.display = 'block';
});
</script>