// ==UserScript==
// @name         My new Bot Bing
// @namespace    http://tampermonkey.net/
// @version      1.00
// @description  Bot for Bing
// @author       Chizhikov Sergey
// @match        https://www.bing.com/*
// @grant        none
// ==/UserScript==

let bingInput = document.getElementsByName("q")[0];
let bingBtn = document.getElementsByClassName("search")[0];
let links = document.links;
//let keywords = ["Базовые вещи про GIT", "10 самых популярных шрифтов от Google",
//                "Отключение редакций и ревизий в WordPress", "Vite — отличное решение для проектов"];
//let keyword = keywords[getRandom(0, keywords.length)];
let keyword = "Vite — отличное решение для проектов";
//Работаем на главной странице
if (bingBtn !== undefined) {
  let i = 0;
  let timerId = setInterval(() => {
    bingInput.value += keyword[i];
    i++;
    if (i == keyword.length) {
      clearInterval(timerId);
      bingBtn.click();
    }
  }, 500)
  //Работаем на странице поисковой выдачи
  } else if (document.querySelector(".b_scopebar") !== null){
    let nextPage = true;
    for (let i = 0; i < links.length; i++) {
      if (links[i].href.indexOf("napli.ru") != -1) {
        let link = links[i];
        let nextPage = false;
        console.log("Нашел строку " + link);
        setTimeout(() => {
          link.click();
        }, getRandom(2000, 3000));
        break;
      }
    }
    if (document.querySelector(".sb_pagS").innerText == "4") {
      let nextPage = false;
      location.href = "https://www.bing.com/"
    }

    if (nextPage) {
      setTimeout(() => {
        document.querySelector(".sb_pagN").click();
      }, getRandom(2500, 3500))

    }
  }

function getRandom(min,max) {
  return Math.floor(Math.random() * (max - min) + min);
}
