<div data-ng-controller="faqCtrl" class="container marketing nlInfo">
    <div data-ng-repeat="section in faq_sections">
        <h2>{{ section.title }}</h2>
        <div class="panel-group" id="accordion{{ $index }}" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default" data-ng-repeat="faq in section.faqs" faq>
            </div>
        </div>
    </div>
</div>
