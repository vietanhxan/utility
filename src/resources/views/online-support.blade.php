<section class="online-support">
    @if($technical !== null || $customerCare !== null)
    <ul class="text-center">
        <li>Bộ phận Kỹ thuật</li>
        <li><a href="tel:{!! $technical !!}">{!! $technical !!}</a></li>
        <div></div>
        <li>Bộ phận CSKH</li>
        <li class="pb-3"><a href="tel:{!! $customerCare !!}">{!! $customerCare !!}</a></li>
    </ul>
    @else
    <ul class="text-center">
        <li>Bộ phận Kỹ thuật</li>
        <li><span class="text-hotline text-danger">Không có dữ liệu !</span></li>
        <div></div>
        <li>Bộ phận CSKH</li>
        <li class="pb-3"><span class="text-hotline text-danger">Không có dữ liệu !</span></li>
    </ul>
    @endif
</section>
