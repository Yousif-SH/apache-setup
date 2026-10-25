## DOM XSS attack

In this example, the attacker can inject XSS payload in the url which result in executing Javascript.
The attacker can craft a URL in this case and share it with vicitm to steal its information.
Example of attack crafted url:
http://localhost/sites/xss/example4/currencyExchange.html?bhd_amount=<script>alert("dd");</script>