<?php
$body = [
    'Messages' => [
        [
        'From' => [
            'Email' => "projetointegradorsenac@proton.me",
            'Name' => "Projeto Integrador SENAC"
        ],
        'To' => [
            [
                'Email' => "yartemimla@gufum.com",
                'Name' => "Email Teste"
            ]
        ],
        'Subject' => "Greetings from Mailjet.",
        'HTMLPart' => `<h3>Dear User, welcome to Mailjet!</h3><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAFAklEQVR4nO2ZSWyVVRTHfyKwYJIEZWxTxMQ44bRU0UCpiIqGIqAbIzuhRVoLitGNOKQQF2wdotVonIhRUjWuNZpYFYQiZdAFmjgQaalU2yLvmWv+L7lez/e9+71+DxPz/sld9Lw7nP93z3RPoYYaasgDE4G7gTeAI8AQUKzSGAIO66y1OjsX3AV8V0XFy41vgeaxEDgXeMbb8GtgI3AJMInqYRJwKfAAsM87fwcwrpINSySGgfsr3WSMGAe0ACMemUxY5ZFYnGHdLGAd0AX0AMelxPfAco2dwGrgggz7LvHIrIxdNFF26Ratj1yzCNgNnE6x9WPATO9vp9grwLWRZ7Ro3dHYALBWC/ZFmNMCoDvSaR2ReQm/7dJtlvPZXs13N1oWr2uyc7Y03AMMZiBxC/BIyhxnhs6k09Cmua/FEDmkyZelzHksRaE+oBNoVISbHNh6p/dlw1GQCSXhcu+MsvhNk6dkJNEjReuBVuBD4CBwCvgRWCFfagfmA8uATxL22pxw9lT97iyhLEqbJZlTeOiovmId8DzwZ4JyPylSFRUUXhKhB4E/jJu5rQL9oiYuMHzihMLzHRH+cky35cv6VTnc5FlCUeMXYG41iHQbN7FY2f5MpLM/muAXG4AblLf8397Jm8giQ4EW3YRFYj+wSc7pO/t6/WaRWSMzC+VX5Ulkt+HYdYY5jejrzgaeAPbI2X8WabdmjoLBsGGm9UYAeDsvIrOMjO2i0wsGiSWy+cEEZ58BDKjMWGqQ6VI0C034vDyIrAs27tOXC6PTBpEopPjJDE+55bqZUOl6w/ya8yDSFWzaaSiwXyYzWMbZOzzZSa0Jk2ObzvBlz+VBpCfY1JnEB4Fsk3wiNLWHvBA61wixTyrq+bJuneHLPs6DyPFg04u9MqbolTN7A9nDxt7twZy9XtlRGq7yviiQHcmDSOkdUBpTDROyZFYyK/mI/z6fHMhOqTzyZe4ma0SymtaeQLaVf6MjwrSOVsu0YpzdRZpthrNvlYmdLxKhmW5LcPamajh7GH63e8/O0uhVNj9phN6kMaA1B4wIuD2QPZsHkfuMhFhnZPtWJa5yBWRRyXSVcRsjSohhblmZB5GZhtKNSlKhEo0iM5BCol9zmowS5UUlzjDbT8uDiMN7weZfqJFgFY0bVZ89Dnyp0OlC6leSzVY/IPSXX3XTnwbyNyP0iyZyvfFlW/V8tUypV8nvCuWE6cDVsn/rvV5QZ2SzIV+YJxGrlB9Vtdsa6RdJo6BO5o3GLe3KoF/0xAuNqHRCZG7PGLH89c3aw5lf+NSdUw0ipeZdWKafll/MU5hM6zb6t+kcuwHYYjh9Abi1Av3+gUGvfrJgvbuLcuylIuSetO8D38jZh1QNfKTk2SBFP0swtY6Es6dlaQeVyg9XOpBCJukBdVhd8yY16KboXwUNekztEEFr7Zky/eaFmuf6ZWXxqia7L5eGNRX6RdJwPlGu015qTrjmd1ms1uQDahynYb6RYyoZb0X8m2G8bqIY0SP+GxNkHkXF/RhcB7wrJ45Vflh13DWRZ7Rr3SHpGIU75QNOsZtjF+mr3quI9LnMxSn8O/CDZDv1RV1FHItl0qWgUJ8JT3uhsk1Xe7YxXn4x6r3xM8P9k+cpLzodVAlxpUqOamG6uotbVGmXQrJrbpwzlo1XGC/Cszn6UjrzmTFBofFlRbP+KirerzO6dOZ/YdI11PC/w19wmv5W80/42wAAAABJRU5ErkJggg=="> teste1`
        ]
    ]
];
  
$ch = curl_init();
  
curl_setopt($ch, CURLOPT_URL, "https://api.mailjet.com/v3.1/send");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json')
);
curl_setopt($ch, CURLOPT_USERPWD, "799118e276f83c37c9d3710ce8655e06:3a9f1abc886bda28e6885f908719931d");
$server_output = curl_exec($ch);
curl_close ($ch);
  
$response = json_decode($server_output);
if ($response->Messages[0]->Status == 'success') {
    echo "Email sent successfully...";
}