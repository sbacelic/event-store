<?php
/*
 * This file is part of the prooph/event-store.
 * (c) 2014 - 2015 prooph software GmbH <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Date: 08/31/14 - 00:27 AM
 */

namespace Prooph\EventStore\Aggregate;

use Iterator;
use Prooph\Common\Messaging\Message;

/**
 * Interface AggregateTranslator
 *
 * @package Prooph\EventStore\Aggregate
 * @author Alexander Miertsch <contact@prooph.de>
 */
interface AggregateTranslator
{
    /**
     * @param object $eventSourcedAggregateRoot
     * @return int
     */
    public function extractAggregateVersion($eventSourcedAggregateRoot);

    /**
     * @param object $eventSourcedAggregateRoot
     * @return string
     */
    public function extractAggregateId($eventSourcedAggregateRoot);

    /**
     * @param AggregateType $aggregateType
     * @param Iterator $historyEvents
     * @return object reconstructed EventSourcedAggregateRoot
     */
    public function reconstituteAggregateFromHistory(AggregateType $aggregateType, Iterator $historyEvents);

    /**
     * @param object $eventSourcedAggregateRoot
     * @return Message[]
     */
    public function extractPendingStreamEvents($eventSourcedAggregateRoot);

    /**
     * @param $anEventSourcedAggregateRoot
     * @param Iterator $events
     */
    public function replayStreamEvents($anEventSourcedAggregateRoot, Iterator $events);
}
