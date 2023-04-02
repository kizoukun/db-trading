<p x-text="search_results"></p>
<ul x-if="search_results.length > 0">
    <template x-for="(result, index) in search_results">
            <li :key="index" x-text="result.symbol + ' - ' + result.name"></li>
    </template>
</ul>
<p x-elseif="search_results && search_results.length < 1">
    No Search Results Found
</p>
