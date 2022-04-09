@extends('./layouts/snipHubLayout')

@section('content')

<h1 class="title title--main">Прайс-лист</h1>
<span class="title main--subtitle">Цены указаны в рублях</span>

@include('partials/servisesList')

<div class="priceSection">
    <div class="title subtitle" id="poshiv_odezhd">Пошив одежды</div>
    <div class="table fiveCols">

        <div class="tableItem tableTopCorner"> </div>
        <div class="tableItem tableTop">Ситец, сатин</div>
        <div class="tableItem tableTop">Шерсть, шелк</div>
        <div class="tableItem tableTop">Трикотаж, шифон, бархат</div>
        <div class="tableItem tableTop">Пальтовые ткани, драп, бутле</div>

        <div class="tableItem tableSide">Юбка</div>
        <div class="tableItem taplePrise tableEvenRow">850 </div>
        <div class="tableItem taplePrise tableEvenRow">1150 </div>
        <div class="tableItem taplePrise tableEvenRow">1250 </div>
        <div class="tableItem taplePrise tableEvenRow">1250 </div>

        <div class="tableItem tableSide">Юбка с подкладкой</div>
        <div class="tableItem taplePrise tableOddRow">950 </div>
        <div class="tableItem taplePrise tableOddRow">1250 </div>
        <div class="tableItem taplePrise tableOddRow">1420 </div>
        <div class="tableItem taplePrise tableOddRow">1420 </div>

        <div class="tableItem tableSide">Блузка (топ)</div>
        <div class="tableItem taplePrise tableEvenRow">800 </div>
        <div class="tableItem taplePrise tableEvenRow">1250 </div>
        <div class="tableItem taplePrise tableEvenRow">1350 </div>
        <div class="tableItem taplePrise tableEvenRow"></div>

        <div class="tableItem tableSide">Платье сарафан</div>
        <div class="tableItem taplePrise tableOddRow">1100</div>
        <div class="tableItem taplePrise tableOddRow">1450 </div>
        <div class="tableItem taplePrise tableOddRow">2000 </div>
        <div class="tableItem taplePrise tableOddRow">2100 </div>

        <div class="tableItem tableSide">Жилет</div>
        <div class="tableItem taplePrise tableEvenRow">950 </div>
        <div class="tableItem taplePrise tableEvenRow">1100 </div>
        <div class="tableItem taplePrise tableEvenRow">1350 </div>
        <div class="tableItem taplePrise tableEvenRow">1420 </div>

        <div class="tableItem tableSide">Брюки</div>
        <div class="tableItem taplePrise tableOddRow">1100 </div>
        <div class="tableItem taplePrise tableOddRow">1550 </div>
        <div class="tableItem taplePrise tableOddRow">1650 </div>
        <div class="tableItem taplePrise tableOddRow">1750 </div>

        <div class="tableItem tableSide">Брюки на подкладке</div>
        <div class="tableItem taplePrise tableEvenRow"> </div>
        <div class="tableItem taplePrise tableEvenRow">1950 </div>
        <div class="tableItem taplePrise tableEvenRow">1950 </div>
        <div class="tableItem taplePrise tableEvenRow">2100 </div>

        <div class="tableItem tableSide">Коибинезон</div>
        <div class="tableItem taplePrise tableOddRow">1650 </div>
        <div class="tableItem taplePrise tableOddRow">1950 </div>
        <div class="tableItem taplePrise tableOddRow">2200 </div>
        <div class="tableItem taplePrise tableOddRow">2500 </div>

        <div class="tableItem tableSide">Куртка утепленная</div>
        <div class="tableItem taplePrise tableEvenRow"> </div>
        <div class="tableItem taplePrise tableEvenRow">2700 </div>
        <div class="tableItem taplePrise tableEvenRow">2950 </div>
        <div class="tableItem taplePrise tableEvenRow">3500 </div>

        <div class="tableItem tableSide">Плащь, пальто демисезонное</div>
        <div class="tableItem taplePrise tableOddRow"> </div>
        <div class="tableItem taplePrise tableOddRow">5700 </div>
        <div class="tableItem taplePrise tableOddRow">6000 </div>
        <div class="tableItem taplePrise tableOddRow">6800 </div>
    </div>
</div>

<div class="priceSection">
    <div class="title subtitle" id="remont_odezhdi">Ремонт одежды</div>

    <div class="table sevenCols">
        <div class="tableItem tableTopCorner" id="zamena_molny">Замена молнии </div>
        <div class="tableItem tableTop">Юбка, брюки </div>
        <div class="tableItem tableTop">Платье, блузка </div>
        <div class="tableItem tableTop">Пиджак, жакет </div>
        <div class="tableItem tableTop">Пальто, д/с </div>
        <div class="tableItem tableTop">Пальто, зимнее </div>
        <div class="tableItem tableTop">Кожа, мех, пух, дубленка </div>

        <div class="tableItem tableSide">Длинна молнии до 50 см </div>
        <div class="tableItem taplePrise tableEvenRow">230 </div>
        <div class="tableItem taplePrise tableEvenRow">240 </div>
        <div class="tableItem taplePrise tableEvenRow">240 </div>
        <div class="tableItem taplePrise tableEvenRow">250 </div>
        <div class="tableItem taplePrise tableEvenRow">270 </div>
        <div class="tableItem taplePrise tableEvenRow">300 </div>

        <div class="tableItem tableSide">Длинна молнии свыше 50 см </div>
        <div class="tableItem taplePrise tableOddRow">260 </div>
        <div class="tableItem taplePrise tableOddRow">280 </div>
        <div class="tableItem taplePrise tableOddRow">320 </div>
        <div class="tableItem taplePrise tableOddRow">320 </div>
        <div class="tableItem taplePrise tableOddRow">400 </div>
        <div class="tableItem taplePrise tableOddRow">420 </div>

        <div class="tableItem tableSide">Длинна молнии свыше 80 см </div>
        <div class="tableItem taplePrise tableEvenRow"> </div>
        <div class="tableItem taplePrise tableEvenRow">250 </div>
        <div class="tableItem taplePrise tableEvenRow">280 </div>
        <div class="tableItem taplePrise tableEvenRow">380 </div>
        <div class="tableItem taplePrise tableEvenRow">420 </div>
        <div class="tableItem taplePrise tableEvenRow">580 </div>
    </div>

    <div class="table sevenCols">
        <div class="tableItem tableTopCorner" id="remont_carmanov">Ремонт карманов</div>
        <div class="tableItem tableTop">Юбка, брюки </div>
        <div class="tableItem tableTop">Платье, блузка </div>
        <div class="tableItem tableTop">Пиджак, жакет </div>
        <div class="tableItem tableTop">Пальто, д/с </div>
        <div class="tableItem tableTop">Пальто, зимнее </div>
        <div class="tableItem tableTop">Кожа, мех, пух, дубленка </div>

        <div class="tableItem tableSide">Длинна молнии до 50 см </div>
        <div class="tableItem taplePrise tableEvenRow">230 </div>
        <div class="tableItem taplePrise tableEvenRow">240 </div>
        <div class="tableItem taplePrise tableEvenRow">240 </div>
        <div class="tableItem taplePrise tableEvenRow">250 </div>
        <div class="tableItem taplePrise tableEvenRow">270 </div>
        <div class="tableItem taplePrise tableEvenRow">300 </div>

        <div class="tableItem tableSide">Длинна молнии свыше 50 см </div>
        <div class="tableItem taplePrise tableOddRow">260 </div>
        <div class="tableItem taplePrise tableOddRow">280 </div>
        <div class="tableItem taplePrise tableOddRow">320 </div>
        <div class="tableItem taplePrise tableOddRow">320 </div>
        <div class="tableItem taplePrise tableOddRow">400 </div>
        <div class="tableItem taplePrise tableOddRow">420 </div>

        <div class="tableItem tableSide">Длинна молнии свыше 80 см </div>
        <div class="tableItem taplePrise tableEvenRow"> </div>
        <div class="tableItem taplePrise tableEvenRow">250 </div>
        <div class="tableItem taplePrise tableEvenRow">280 </div>
        <div class="tableItem taplePrise tableEvenRow">380 </div>
        <div class="tableItem taplePrise tableEvenRow">420 </div>
        <div class="tableItem taplePrise tableEvenRow">580 </div>
    </div>

    <div class="table fiveCols">
        <div class="tableItem tableTopCorner">Ремонт рукавов</div>
        <div class="tableItem tableTop">Пиджак на подкладке</div>
        <div class="tableItem tableTop">Пальто д/с </div>
        <div class="tableItem tableTop">Пальто зимнее </div>
        <div class="tableItem tableTop">Пальто, д/с </div>

        <div class="tableItem tableSide">Укоротить рукава</div>
        <div class="tableItem taplePrise tableEvenRow">230 </div>
        <div class="tableItem taplePrise tableEvenRow">240 </div>
        <div class="tableItem taplePrise tableEvenRow">240 </div>
        <div class="tableItem taplePrise tableEvenRow">250 </div>


        <div class="tableItem tableSide">изменить фасон рукова</div>
        <div class="tableItem taplePrise tableOddRow">260 </div>
        <div class="tableItem taplePrise tableOddRow">280 </div>
        <div class="tableItem taplePrise tableOddRow">320 </div>
        <div class="tableItem taplePrise tableOddRow">320 </div>


        <div class="tableItem tableSide">изготовить вновь паты или манжеты</div>
        <div class="tableItem taplePrise tableEvenRow">420 </div>
        <div class="tableItem taplePrise tableEvenRow">420 </div>
        <div class="tableItem taplePrise tableEvenRow">520 </div>
        <div class="tableItem taplePrise tableEvenRow">580 </div>

    </div>
</div>

<div class="priceSection">
    <div class="title subtitle" id="tekstilnye_izdelia">Текстильные изделия</div>
    <div class="table threeCols" id="chehly">

        <div class="tableItem tableTopCorner" >Чехлы</div>
        <div class="tableItem tableTop">единича измерения</div>
        <div class="tableItem tableTop">цена</div>        

        <div class="tableItem tableSide">Изготовление валика диаметром 15 х 50см</div>
        <div class="tableItem taplePrise tableEvenRow">шт. </div>
        <div class="tableItem taplePrise tableEvenRow">640 </div>

        <div class="tableItem tableSide">Чехол на валик</div>
        <div class="tableItem taplePrise tableOddRow">шт. </div>
        <div class="tableItem taplePrise tableOddRow">820 </div>

        <div class="tableItem tableSide">Чехол на стул</div>
        <div class="tableItem taplePrise tableEvenRow">шт. </div>
        <div class="tableItem taplePrise tableEvenRow">620 </div>

        <div class="tableItem tableSide">Сидушка на табурет</div>
        <div class="tableItem taplePrise tableOddRow">шт. </div>
        <div class="tableItem taplePrise tableOddRow">460 </div>

    </div>

    <div class="table threeCols">

        <div class="tableItem tableTopCorner">Постельное белье</div>
        <div class="tableItem tableTop">единича измерения</div>
        <div class="tableItem tableTop">цена/руб</div>        

        <div class="tableItem tableSide">Изготовить наволочку 50*50, ткань хлопок </div>
        <div class="tableItem taplePrise tableEvenRow">шт. </div>
        <div class="tableItem taplePrise tableEvenRow">70 </div>

        <div class="tableItem tableSide">Изготовить наволочку 50*60, 
            50*70, ткань хлопок </div>
        <div class="tableItem taplePrise tableOddRow">шт. </div>
        <div class="tableItem taplePrise tableOddRow">85 </div>

        <div class="tableItem tableSide">Сшить простынь 1,5 спальную, хлопок</div>
        <div class="tableItem taplePrise tableEvenRow">шт. </div>
        <div class="tableItem taplePrise tableEvenRow">120 </div>

        <div class="tableItem tableSide">Сшить простынь двуспальную, хлопок</div>
        <div class="tableItem taplePrise tableOddRow">шт. </div>
        <div class="tableItem taplePrise tableOddRow">140 </div>

        <div class="tableItem tableSide">Сшить пододеяльник 1,5 спальную, хлопок</div>
        <div class="tableItem taplePrise tableEvenRow">шт. </div>
        <div class="tableItem taplePrise tableEvenRow">200 </div>

        <div class="tableItem tableSide">Сшить пододеяльник двуспальную, хлопок</div>
        <div class="tableItem taplePrise tableOddRow">шт. </div>
        <div class="tableItem taplePrise tableOddRow">250 </div>

        <div class="tableItem tableSide">Сложные текстильные ткани</div>
        <div class="tableItem taplePrise tableOddRow">% </div>
        <div class="tableItem taplePrise tableOddRow">20 </div>

    </div>
</div>

@endsection