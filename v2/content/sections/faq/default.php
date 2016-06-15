<div data-ng-controller="faqCtrl" class="container marketing nlInfo">
    <h2>Frequently Asked Questions</h2>
    <div data-ng-repeat="section in faq_sections">
        <h3>{{ section.title }}</h3>
        <div class="panel-group" id="accordion{{ $index }}" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default" data-ng-repeat="faq in section.faqs" faq>
            </div>
        </div>
    </div>
</div>
