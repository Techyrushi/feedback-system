<?php
function flash($name = '', $message = '', $class = 'alert alert-success') {
    if (!empty($name)) {
        if (!empty($message) && empty($_SESSION[$name])) {
            $_SESSION[$name] = $message;
            $_SESSION[$name . '_class'] = $class;
        } elseif (empty($message) && !empty($_SESSION[$name])) {
            $class = $_SESSION[$name . '_class'] ?? 'alert alert-info';
            echo '
                <div id="flashAlert" class="' . $class . ' fade show" role="alert">
                    ' . htmlspecialchars($_SESSION[$name]) . '
                </div>
                <script>
                    setTimeout(function () {
                        var alertEl = document.getElementById("flashAlert");
                        if (alertEl) {
                            alertEl.classList.remove("show");
                            alertEl.classList.add("hide");
                            setTimeout(function () {
                                alertEl.remove();
                            }, 500); // Wait for fade out transition
                        }
                    }, 5000);
                </script>
            ';
            unset($_SESSION[$name]);
            unset($_SESSION[$name . '_class']);
        }
    }
}
