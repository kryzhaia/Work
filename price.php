<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Прайс';
$this->params['breadcrumbs'][] = $this->title;
$this->params['headerClass'] = 'price';

\frontend\assets\NicescrollPluginAsset::register($this);
?>
    <section id="price">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="content-wrap" style="overflow:auto">
                        <h4>Прайс</h4>

                        <div class="filter-wrap">
                            <div class="input-group">
                                <input type="text" id="filter-input" class="form-control" name="NewsBlogSearch[content]" placeholder="Поиск"><span class="input-group-btn">
                                    <button type="submit" id="search-button" class="btn btn-success" onclick="getDataJson()"><i class="icon-search"></i></button>
                                    <a id="cancel-button" class="btn btn-primary"><i class="icon-close"></i></a></span>
                            </div>
                            <div class="price-download">
                                <a href="/site/price-pdf" target="_blank" class="btn btn-success">Скачать прайс&nbsp;<i class="icon-arrow-down"></i></a>
                            </div>
                        </div>



                        <div class="table-wrap">
                            <table id="tableContent">
                                <thead>
                                <tr bgcolor="#82be50">
                                    <th style="width: 126px;"> Артикул </th>
                                    <th style="width: 71px;">Бренд</th>
                                    <th style="width: 510px;">Номенклатура</th>
                                    <th style="width: 187px;">СКЛ категория номенклатуры</th>
                                    <th style="width: 131px;">Баллы от 30.01.2020</th>
                                    <th style="width: 112px;">Тип начисления</th>
                                </tr>
                                </thead>
                                <tbody id="pricelist">
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
$this->registerCss(<<<CSS
.title-header+.container{
    width: 100%;
    padding: 0;
}

.preloader {
  margin: 20px auto;
  font-size: 6px;
  width: 1em;
  height: 1em;
  border-radius: 50%;
  position: relative;
  text-indent: -9999em;
  -webkit-animation: load5 1.1s infinite ease;
  animation: load5 1.1s infinite ease;
  -webkit-transform: translateZ(0);
  -ms-transform: translateZ(0);
  transform: translateZ(0);

}

@-webkit-keyframes load5 {
  0%,
  100% {
    box-shadow: 0em -2.6em 0em 0em #c0c0c0, 1.8em -1.8em 0 0em rgba(192,192,192, 0.2), 2.5em 0em 0 0em rgba(192,192,192, 0.2), 1.75em 1.75em 0 0em rgba(192,192,192, 0.2), 0em 2.5em 0 0em rgba(192,192,192, 0.2), -1.8em 1.8em 0 0em rgba(192,192,192, 0.2), -2.6em 0em 0 0em rgba(192,192,192, 0.5), -1.8em -1.8em 0 0em rgba(192,192,192, 0.7);
  }
  12.5% {
    box-shadow: 0em -2.6em 0em 0em rgba(192,192,192, 0.7), 1.8em -1.8em 0 0em #c0c0c0, 2.5em 0em 0 0em rgba(192,192,192, 0.2), 1.75em 1.75em 0 0em rgba(192,192,192, 0.2), 0em 2.5em 0 0em rgba(192,192,192, 0.2), -1.8em 1.8em 0 0em rgba(192,192,192, 0.2), -2.6em 0em 0 0em rgba(192,192,192, 0.2), -1.8em -1.8em 0 0em rgba(192,192,192, 0.5);
  }
  25% {
    box-shadow: 0em -2.6em 0em 0em rgba(192,192,192, 0.5), 1.8em -1.8em 0 0em rgba(192,192,192, 0.7), 2.5em 0em 0 0em #c0c0c0, 1.75em 1.75em 0 0em rgba(192,192,192, 0.2), 0em 2.5em 0 0em rgba(192,192,192, 0.2), -1.8em 1.8em 0 0em rgba(192,192,192, 0.2), -2.6em 0em 0 0em rgba(192,192,192, 0.2), -1.8em -1.8em 0 0em rgba(192,192,192, 0.2);
  }
  37.5% {
    box-shadow: 0em -2.6em 0em 0em rgba(192,192,192, 0.2), 1.8em -1.8em 0 0em rgba(192,192,192, 0.5), 2.5em 0em 0 0em rgba(192,192,192, 0.7), 1.75em 1.75em 0 0em #c0c0c0, 0em 2.5em 0 0em rgba(192,192,192, 0.2), -1.8em 1.8em 0 0em rgba(192,192,192, 0.2), -2.6em 0em 0 0em rgba(192,192,192, 0.2), -1.8em -1.8em 0 0em rgba(192,192,192, 0.2);
  }
  50% {
    box-shadow: 0em -2.6em 0em 0em rgba(192,192,192, 0.2), 1.8em -1.8em 0 0em rgba(192,192,192, 0.2), 2.5em 0em 0 0em rgba(192,192,192, 0.5), 1.75em 1.75em 0 0em rgba(192,192,192, 0.7), 0em 2.5em 0 0em #c0c0c0, -1.8em 1.8em 0 0em rgba(192,192,192, 0.2), -2.6em 0em 0 0em rgba(192,192,192, 0.2), -1.8em -1.8em 0 0em rgba(192,192,192, 0.2);
  }
  62.5% {
    box-shadow: 0em -2.6em 0em 0em rgba(192,192,192, 0.2), 1.8em -1.8em 0 0em rgba(192,192,192, 0.2), 2.5em 0em 0 0em rgba(192,192,192, 0.2), 1.75em 1.75em 0 0em rgba(192,192,192, 0.5), 0em 2.5em 0 0em rgba(192,192,192, 0.7), -1.8em 1.8em 0 0em #c0c0c0, -2.6em 0em 0 0em rgba(192,192,192, 0.2), -1.8em -1.8em 0 0em rgba(192,192,192, 0.2);
  }
  75% {
    box-shadow: 0em -2.6em 0em 0em rgba(192,192,192, 0.2), 1.8em -1.8em 0 0em rgba(192,192,192, 0.2), 2.5em 0em 0 0em rgba(192,192,192, 0.2), 1.75em 1.75em 0 0em rgba(192,192,192, 0.2), 0em 2.5em 0 0em rgba(192,192,192, 0.5), -1.8em 1.8em 0 0em rgba(192,192,192, 0.7), -2.6em 0em 0 0em #c0c0c0, -1.8em -1.8em 0 0em rgba(192,192,192, 0.2);
  }
  87.5% {
    box-shadow: 0em -2.6em 0em 0em rgba(192,192,192, 0.2), 1.8em -1.8em 0 0em rgba(192,192,192, 0.2), 2.5em 0em 0 0em rgba(192,192,192, 0.2), 1.75em 1.75em 0 0em rgba(192,192,192, 0.2), 0em 2.5em 0 0em rgba(192,192,192, 0.2), -1.8em 1.8em 0 0em rgba(192,192,192, 0.5), -2.6em 0em 0 0em rgba(192,192,192, 0.7), -1.8em -1.8em 0 0em #c0c0c0;
  }
}
@keyframes load5 {
  0%,
  100% {
    box-shadow: 0em -2.6em 0em 0em #c0c0c0, 1.8em -1.8em 0 0em rgba(192,192,192, 0.2), 2.5em 0em 0 0em rgba(192,192,192, 0.2), 1.75em 1.75em 0 0em rgba(192,192,192, 0.2), 0em 2.5em 0 0em rgba(192,192,192, 0.2), -1.8em 1.8em 0 0em rgba(192,192,192, 0.2), -2.6em 0em 0 0em rgba(192,192,192, 0.5), -1.8em -1.8em 0 0em rgba(192,192,192, 0.7);
  }
  12.5% {
    box-shadow: 0em -2.6em 0em 0em rgba(192,192,192, 0.7), 1.8em -1.8em 0 0em #c0c0c0, 2.5em 0em 0 0em rgba(192,192,192, 0.2), 1.75em 1.75em 0 0em rgba(192,192,192, 0.2), 0em 2.5em 0 0em rgba(192,192,192, 0.2), -1.8em 1.8em 0 0em rgba(192,192,192, 0.2), -2.6em 0em 0 0em rgba(192,192,192, 0.2), -1.8em -1.8em 0 0em rgba(192,192,192, 0.5);
  }
  25% {
    box-shadow: 0em -2.6em 0em 0em rgba(192,192,192, 0.5), 1.8em -1.8em 0 0em rgba(192,192,192, 0.7), 2.5em 0em 0 0em #c0c0c0, 1.75em 1.75em 0 0em rgba(192,192,192, 0.2), 0em 2.5em 0 0em rgba(192,192,192, 0.2), -1.8em 1.8em 0 0em rgba(192,192,192, 0.2), -2.6em 0em 0 0em rgba(192,192,192, 0.2), -1.8em -1.8em 0 0em rgba(192,192,192, 0.2);
  }
  37.5% {
    box-shadow: 0em -2.6em 0em 0em rgba(192,192,192, 0.2), 1.8em -1.8em 0 0em rgba(192,192,192, 0.5), 2.5em 0em 0 0em rgba(192,192,192, 0.7), 1.75em 1.75em 0 0em #c0c0c0, 0em 2.5em 0 0em rgba(192,192,192, 0.2), -1.8em 1.8em 0 0em rgba(192,192,192, 0.2), -2.6em 0em 0 0em rgba(192,192,192, 0.2), -1.8em -1.8em 0 0em rgba(192,192,192, 0.2);
  }
  50% {
    box-shadow: 0em -2.6em 0em 0em rgba(192,192,192, 0.2), 1.8em -1.8em 0 0em rgba(192,192,192, 0.2), 2.5em 0em 0 0em rgba(192,192,192, 0.5), 1.75em 1.75em 0 0em rgba(192,192,192, 0.7), 0em 2.5em 0 0em #c0c0c0, -1.8em 1.8em 0 0em rgba(192,192,192, 0.2), -2.6em 0em 0 0em rgba(192,192,192, 0.2), -1.8em -1.8em 0 0em rgba(192,192,192, 0.2);
  }
  62.5% {
    box-shadow: 0em -2.6em 0em 0em rgba(192,192,192, 0.2), 1.8em -1.8em 0 0em rgba(192,192,192, 0.2), 2.5em 0em 0 0em rgba(192,192,192, 0.2), 1.75em 1.75em 0 0em rgba(192,192,192, 0.5), 0em 2.5em 0 0em rgba(192,192,192, 0.7), -1.8em 1.8em 0 0em #c0c0c0, -2.6em 0em 0 0em rgba(192,192,192, 0.2), -1.8em -1.8em 0 0em rgba(192,192,192, 0.2);
  }
  75% {
    box-shadow: 0em -2.6em 0em 0em rgba(192,192,192, 0.2), 1.8em -1.8em 0 0em rgba(192,192,192, 0.2), 2.5em 0em 0 0em rgba(192,192,192, 0.2), 1.75em 1.75em 0 0em rgba(192,192,192, 0.2), 0em 2.5em 0 0em rgba(192,192,192, 0.5), -1.8em 1.8em 0 0em rgba(192,192,192, 0.7), -2.6em 0em 0 0em #c0c0c0, -1.8em -1.8em 0 0em rgba(192,192,192, 0.2);
  }
  87.5% {
    box-shadow: 0em -2.6em 0em 0em rgba(192,192,192, 0.2), 1.8em -1.8em 0 0em rgba(192,192,192, 0.2), 2.5em 0em 0 0em rgba(192,192,192, 0.2), 1.75em 1.75em 0 0em rgba(192,192,192, 0.2), 0em 2.5em 0 0em rgba(192,192,192, 0.2), -1.8em 1.8em 0 0em rgba(192,192,192, 0.5), -2.6em 0em 0 0em rgba(192,192,192, 0.7), -1.8em -1.8em 0 0em #c0c0c0;
  }
}




CSS
);

$this->registerJsFile('/js/pricelist.js', ['depends' => [
    'frontend\assets\AppAsset',
]]);



