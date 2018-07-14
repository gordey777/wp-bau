<?php /* Template Name: Home Page */ get_header(); ?>

  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

  <div class="background">
    <div class="cycle-slideshow" data-cycle-fx="tileSlide" data-cycle-tile-count="10" data-cycle-tile-vertical="false" data-cycle-timeout="6000">
      <img src="<?php echo get_template_directory_uri(); ?>/img/bg-domino.jpg" title="Офисный центр «Домино»" alt="Отделочные работы">
      <img src="<?php echo get_template_directory_uri(); ?>/img/bg-artmall.jpg" title="ТРЦ «Арт Молл», гипермаркет «Фоззи»" alt="Отделочные работы">
      <img src="<?php echo get_template_directory_uri(); ?>/img/bg-rayon.jpg" title="ТРЦ «Район»" alt="Общестроительные и отделочные работы">
      <img src="<?php echo get_template_directory_uri(); ?>/img/bg-roshen.jpg" title="Фабрика «Рошен»" alt="Общестроительные и отделочные работы">
      <img src="<?php echo get_template_directory_uri(); ?>/img/bg-khortitsa.jpg" title="МФК «Khortitsa Palace»" alt="Общестроительные и отделочные работы">
      <img src="<?php echo get_template_directory_uri(); ?>/img/bg-delta.jpg" title="Офисно-складской комплекс «Delta Medical»" alt="Отделочные работы">
    </div>
    <div class="pattern"></div>
    <div class="cycle-caption">
      <h3>Офисный центр «Домино»</h3>
      <p>Отделочные работы</p>
      <p></p>
    </div>
  </div>
  <div class="container">
    <div class="line">
      <div class="services">
        <a href="https://kauper.com.ua/services/general-contracting/" class="service-1"><i></i><b>Генеральный<br>подряд</b></a>
        <a href="https://kauper.com.ua/services/finishing-work/" class="service-2"><i></i><b>Отделочные<br>работы</b></a>
        <a href="https://kauper.com.ua/services/reconstruction-and-renovation-of-buildings/" class="service-3"><i></i><b>Реконструкция<br>и&nbsp;ремонт зданий</b></a>
        <a href="https://kauper.com.ua/services/general-construction-works/" class="service-4"><i></i><b>Общестроительные<br>работы</b></a>
      </div>
      <div class="citation">
        <div class="active">
          <h2>Генеральный подряд, строительные работы</h2>
          <p>Строительство офисных, торговых, производственных, складских, социально-бытовых зданий…</p>
          <p></p>
        </div>
        <div>
          <h2>Комплексные ремонтные отделочные работы</h2>
          <p>Ремонт офисов, магазинов и&nbsp;супермаркетов, торговых и&nbsp;развлекательных центров, ресторанов, гостиниц, любых помещений социально-бытового назначения…</p>
          <p></p>
        </div>
        <div>
          <h2>Реконструкция зданий и&nbsp;помещений</h2>
          <p>Коммерческого назначения: офисные и&nbsp;торговые, производственные, складские, социально-бытовые…</p>
          <p></p>
        </div>
        <div>
          <h2>Невероятный опыт</h2>
          <p>С&nbsp;2005&nbsp;года компания выполнила комплексных отделочных работ на&nbsp;78&nbsp;объектах, общей площадью 312&nbsp;000&nbsp;м²…</p>
          <p></p>
        </div>
      </div>
    </div>
  </div>
  <div class="last-news">
    <div class="title"><a href="#/news/">Новости</a></div>
    <div class="news-marquee">
      <b>18 сентября</b>
      <a href="#" data-photo="/pub/news/8872e422ed398471.jpg">Наша компания приступила к реализации комплексных внутренних отделочных работ в производственном здании.</a>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <b>2 августа </b>
      <a href="#" data-photo="/pub/news/5f8f8ccaba0f83c1.jpg">Подписан договор и начаты работы по внутренним отделочным работам в многоквартирном жилом доме.</a>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <b>17 мая </b>
      <a href="#" data-photo="/pub/news/f113338aac8e06e1.jpg">Мы приступили к реализации проекта по комплексным внутренним отделочным работам на фабрике "Рошен"</a>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
  </div>


</html>

  <?php endwhile; endif; ?>

<?php get_footer(); ?>
