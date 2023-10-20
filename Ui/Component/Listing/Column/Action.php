<?php
namespace Brainvire\Logs\Ui\Component\Listing\Column;

use Magento\Ui\Component\Listing\Columns\Column;

class Action extends Column
{
    const URL_PATH_DOWNLOAD = 'log/index/download';

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $item[$this->getData('name')] = [
                    'download' => [
                        'href' => $this->context->getUrl(
                            self::URL_PATH_DOWNLOAD,
                            ['log_id' => $item['logid'], 'name' => $item['name']] // Pass filename as a parameter
                        ),
                        'label' => __('Download'),
                        'hidden' => false,
                    ],
                ];
            }
        }
        return $dataSource;
    }
}
