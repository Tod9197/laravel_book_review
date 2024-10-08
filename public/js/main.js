// const { default: laravel } = require("laravel-vite-plugin");

// Burger menus
document.addEventListener("DOMContentLoaded", function () {
    // open
    const burger = document.querySelectorAll(".navbar-burger");
    const menu = document.querySelectorAll(".navbar-menu");

    if (burger.length && menu.length) {
        for (var i = 0; i < burger.length; i++) {
            burger[i].addEventListener("click", function () {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle("hidden");
                }
            });
        }
    }

    // close
    const close = document.querySelectorAll(".navbar-close");
    const backdrop = document.querySelectorAll(".navbar-backdrop");

    if (close.length) {
        for (var i = 0; i < close.length; i++) {
            close[i].addEventListener("click", function () {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle("hidden");
                }
            });
        }
    }

    if (backdrop.length) {
        for (var i = 0; i < backdrop.length; i++) {
            backdrop[i].addEventListener("click", function () {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle("hidden");
                }
            });
        }
    }
});

// successメッセージのフェードアウト
document.addEventListener("DOMContentLoaded", function () {
    // 3秒後にメッセージをフェードアウトさせる
    setTimeout(function () {
        var message = document.getElementById("success-message");
        if (message) {
            message.classList.add("fade-out");
        }
    }, 2000); // 3000ミリ秒（3秒）

    // 4秒後にメッセージを完全に削除する
    setTimeout(function () {
        var message = document.getElementById("success-message");
        if (message) {
            message.classList.add("hidden");
        }
    }, 3000); // 4000ミリ秒（4秒）
});

// 検索バー未入力時ボタンが押せない
document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");
    const searchButton = document.getElementById("searchButton");

    if (searchInput && searchButton) {
        searchInput.addEventListener("input", function () {
            if (searchInput.value.trim() !== "") {
                searchButton.disabled = false;
            } else {
                searchButton.disabled = true;
            }
        });
    }
});

// 削除確認メッセージ表示
function confirmDelete() {
    return confirm("投稿を完全に削除しますか？");
}

// 退会確認ボタン
function confirmWithdraw() {
    if (confirm("本当に退会しますか？投稿した記事は全て削除されます。")) {
        document.getElementById("withdraw-form").submit();
    }
}
// ハンバーガーメニュー
function toggleMenu() {
    const menu = document.querySelector(".under-nav");
    menu.classList.toggle("show");
}
