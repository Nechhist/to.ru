<p>
    <?= $form->field($model, 'name')->textInput(['size'=>'20', 'maxlength'=>'20', 'placeholder'=>'Tournament X'])
        ->label($model->attributeLabels()['name'] . ' <span class="desc_field" >(максимально 20 символов. Пример: "Лига Меча и Магии", "Кубок Большого Брата")</span>'); ?>
</p>

<p>
    <?= $form->field($model, 'game')->textInput(['size'=>'15', 'maxlength'=>'15', 'placeholder'=>'Game of thrones'])
        ->label($model->attributeLabels()['game'] . ' <span class="desc_field" >(максимально 15 символов. Пример: "Dota2", "Шахматы")</span>') ?>
</p>

<p>
    <?= $form->field($model, 'site')->textInput(['size'=>'20', 'maxlength'=>'50', 'placeholder'=>'http://www.yandex.ru'])
        ->label($model->attributeLabels()['site'] . ' <span class="desc_field" >(максимально 50 символов. Пример: "http://vk.com/to_dota2")</span>') ?>
</p>

<p>
    <?= $form->field($model, 'opisanie')->textarea(['size'=>'20', 'rows'=>'2', 'cols'=>'60','placeholder'=>'Не хочу ничего описывать...'])
        ->label($model->attributeLabels()['opisanie'] . ' <span class="desc_field" >(максимально 500 символов)</span>') ?>
</p>