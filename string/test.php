<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>字串處理</title>
    <style>
        h1{
            text-align:center;
            font-size:1.5em;
            color:blue;
            border-bottom:1px solid #ccc;
            padding-bottom:10px;
        }
    </style>
</head>
<body>
<?php
$str="SpaceX創辦人伊隆馬斯克（Elon Musk）近日重申人類應移居火星，作為對抗地球最終毀滅的保險政策。根據美國國家航空暨太空總署（NASA）與日本東邦大學的最新研究，地球上的生命可能會在約10億年後因太陽演化而面臨全面滅絕。<br>
根據外媒報導，這項研究發表於《自然地球科學》（Nature Geoscience），科學家利用超級電腦與氣候模型模擬太陽長期變化對地球環境的影響。他們進行超過40萬次模擬，發現隨著太陽亮度與溫度逐漸增加，地球將面臨氣候極端化與氧氣逐步消失的危機，最終導致有氧生命無法存活，僅剩下厭氧微生物得以苟延殘喘。<br>
研究指出，地球大氣中氧氣的穩定存在將於約10.8億年後崩潰，誤差範圍約為1.4億年。此後，地表氣候將變得極度不穩，海洋沸騰、生命系統瓦解，預示著地球生物圈的終結。<br>
馬斯克接受福斯新聞專訪時表示，「最終地球上的所有生命都將被太陽毀滅。這是推動我致力於火星殖民的原因之一。」他形容火星是「集體生命的壽險」，人類若想延續文明，必須成為「多行星物種」。太陽預計在約50億年後進入紅巨星階段，屆時太陽體積將大幅膨脹，可能吞噬水星、金星甚至地球，這一過程將徹底摧毀地球現有的物理結構與環境。<br>
面對長遠的宇宙命運，馬斯克提出希望未來20年內在火星建立可容納百萬人的自給自足城市。他強調：「如果火星必須依賴地球補給才能生存，那我們並未真正建立生命的保險機制。只有當火星可以獨立生存時，人類的未來才真正有保障。」<br>
美國政府也展現出對太空殖民的支持，川普總統任內曾批准對NASA的預算重組，將60億美元由國際太空站營運與研究計畫中轉移至載人太空任務，包括火星探索。<br>
SpaceX目前正全力推進星際飛船（Starship）計畫，該火箭系統為全球最強大，設計可重複使用，大幅降低發射成本。2025年初進行的兩次試射雖未完全成功，但展現出強勁的技術進展。馬斯克計畫最快於明年發射無人火星任務，並於四年內實現載人登陸。<br>";
//echo $str;
 $keywords=[
           ['content'=>'馬斯克',
            'style'=>'font-size:1.1em;color:green;',
            'url'=>'https://en.wikipedia.org/wiki/Elon_Musk'],
           ['content'=>'火星',
            'style'=>'font-size:1em;color:red;',
            'url'=>''],
           ['content'=>'地球',
            'style'=>'font-size:1.2em;color:blue;',
            'url'=>''],
           ['content'=>'火箭',
            'style'=>'font-size:1.3em;color:orange;',
            'url'=>''],
           ['content'=>'NASA',
            'style'=>'font-size:1.4em;color:purple;',
            'url'=>'https://en.wikipedia.org/wiki/NASA']
        ]; 
foreach ($keywords as $key => $value) {
    print_r()
}

        
// foreach($keywords as $index => $keyword){
//         if($url[$index]!=""){
//             $strwithurl="<a href='$url[$index]'>$keyword</a>";
//         }else{
//             $strwithurl=$keyword;
//         }

//         $strwithstyle="<span style='$style[$index]'>$strwithurl</span>";

//         $str=str_replace("$keyword","$strwithstyle",$str);
// }        

echo $str;
?>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>