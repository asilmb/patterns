<h3>Раннее/статическое связывание</h3>
<p>Теперь давайте «скомпилируем» такой код:</p>
<figure class="code">
<pre class="code cm-s-default CodeMirror" lang="pseudocode"><span class="cm-keyword">method</span> <span class="cm-def3">exportShape</span><span class="cm-bracket">(</span><span class="cm-variable">shape</span><span class="cm-bracket">:</span> <span class="cm-variable">Shape</span><span class="cm-bracket">)</span> <span class="cm-keyword">is</span>
    <span class="cm-variable">Exporter</span> <span class="cm-variable">exporter</span> <span class="cm-operator">=</span> <span class="cm-keyword">new</span> <span class="cm-variable">Exporter</span><span class="cm-bracket">(</span><span class="cm-bracket">)</span>
    <span class="cm-variable">exporter</span>.<span class="cm-variable">export</span><span class="cm-bracket">(</span><span class="cm-variable">shape</span><span class="cm-bracket">)</span><span class="cm-bracket">;</span>
</pre>
</figure>
<p>С созданием объекта всё ясно. Как насчёт вызова метода <code>export</code>? В классе <code>Exporter</code> у нас есть пять версий метода с таким именем, которые отличаются только типом параметра. Похоже, здесь тоже придётся динамически отслеживать тип передаваемого параметра и по нему определять какой из методов выбрать.</p>
<p>Но здесь нас ждёт засада. Что если кто-то подаст в метод <code>exportShape</code> такой объект, для которого не существует метода <code>export</code> в классе <code>Exporter</code>? Например, объект <code>Ellipse</code>, для которого у нас нет экспорта. Действительно, у нас нет гарантии что необходимый метод будет существовать, как это было с переопределенными методами. А значит, возникнет неоднозначная ситуация.</p>
<p>Именно поэтому все разработчики компиляторов выбирают безопасную тропинку и применяют раннее или статическое связывание для перегруженных методов:</p>
<ul>
	<li>
		<strong>Раннее</strong>, потому что оно происходит ещё на этапе компиляции программы.</li>
	<li>
		<strong>Статическое</strong>, потому что его уже не изменить во время выполнения.</li>
</ul>
<p>Вернемся к нашему примеру. Мы уверены в том, что имеем параметр с типом <code>Shape</code>. Мы знаем что в <code>Exporter</code> существует подходящая реализация: <code>export(s: Shape)</code>. Значит, этот участок кода мы жёстко связываем с известной реализацией метода.</p>
<p>И поэтому даже если мы подадим в параметрах один из подклассов <code>Shape</code>, всё равно будет вызвана реализация <code>export(s: Shape)</code>.</p>