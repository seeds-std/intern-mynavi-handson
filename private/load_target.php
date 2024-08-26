<?php

echo '
<style>
.text-rainbow {
    background-image: linear-gradient(to right, red, yellow, lime, cyan, blue, magenta, red);
    background-size: 200%;
    background-clip: text;
    color: transparent;
    animation: 3s linear 0s infinite normal none running rainbow;
    font-weight: 700;
}
@keyframes rainbow {
    100% {
        background-position-x: 200%;
    }
}
</style>
<div class="text-rainbow">SUCCESS.</div>
';
